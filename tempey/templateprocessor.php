<?php
    include(__DIR__ . "./templatevariables.php");

    class TemplatingEngine
    {
        public function Process($template)
        {
            global $templateData;

            $lines = explode(PHP_EOL, $template);
            $linesout = "";

            $loopStartIndex = -1;
            $loopIndex = 0;
            $loopMaxIndex = 0;
            $loopParamLoopName = "";
            $loopParaName = "";

            for ($i = 0;$i<sizeof($lines);$i++)
            {
                $line = $lines[$i];

                $output = "";

                if (strpos($line, "{%") === false)
                {
                    $bits = explode('{{ ', $line);
        
                    for ($b=0;$b<sizeof($bits);$b++)
                    {
                        $bitparts = explode(' }}', $bits[$b]);
        
                        if (sizeof($bitparts) > 1)
                        {
                            $variablebits = explode(".", $bitparts[0]);
                            $variablevalue = "Unset";
        
                            if (sizeof($variablebits) > 1)
                            {
                                $subvariable = $variablebits[1];
        
                                if (isset($templateData[$variablebits[0]]) && isset($templateData[$variablebits[0]]->$subvariable))
                                {
                                    $variablevalue = $templateData[$variablebits[0]]->$subvariable;
                                }
                            }
                            else
                            {
                                if (isset($templateData[$bitparts[0]]))
                                {
                                    $variablevalue = $templateData[$bitparts[0]];
                                }
                            }
        
                            $output = $output . $variablevalue . $bitparts[1];
                        }
                        else
                        {
                            $output = $output . $bitparts[0];
                        }
                    }
                }
                else
                {
                    //We have a for block (assume)
                    $command_bits = explode(' ',explode(' %}', explode('{% ', $line)[1])[0]);
                    $command_type = $command_bits[0];

                    if ($command_type == "endfor")
                    {
                        if ($loopIndex >= $loopMaxIndex - 1)
                        {
                            $loopStartIndex = -1;
                        }
                        else
                        {
                            $i = $loopStartIndex;
                            $loopIndex++;
                            SetTemplateVar($loopParamLoopName, GetTemplateVar($loopParaName)[$loopIndex]);
                        }
                    }
                    else
                    {
                        $loopStartIndex = $i;
                        $loopParamLoopName = $command_bits[1];
                        $loopParaName = $command_bits[3];
                        $loopIndex = 0;
                        $loopMaxIndex = sizeof(GetTemplateVar($loopParaName));
                        SetTemplateVar($loopParamLoopName, GetTemplateVar($loopParaName)[$loopIndex]);
                    }
                }

                $linesout = $linesout . $output;
            }

            return $linesout;
        }

        public function Run()
        {
            $classes_included = get_declared_classes ();

            foreach ($classes_included as $classname)
            {
                if (strpos($classname, "Service"))
                {
                    $class = new $classname();
                    $class->Run();
                }
            }

            $htmltemplate = ob_get_contents();

            ob_clean() ;

            echo $this->Process($htmltemplate);
        }
    }

    (new TemplatingEngine())->Run();
?>