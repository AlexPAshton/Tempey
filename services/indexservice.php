<?php
    include("./models/corefeaturemodel.php");

    class IndexService
    {
        public function Run()
        {
            SetTemplateVar('CoreFeatures', [
                new CoreFeatureModel("{{ x }}", "Simple Syntax", "Use simple syntax to have your variables inserted within your html code."),
                new CoreFeatureModel("{{ for x in y }}", "Core Functionality", "Outputting lists? No problem! Use built in logic syntax to iterate over an array."),
                new CoreFeatureModel("include(...)", "Easy Implementation", "Implement into any HTML page with the use of a php include at the bottom of the document."),
            ]);

            SetTemplateVar('GitHubDownload','https://github.com/AlexPAshton/Tempey/archive/master.zip');
            SetTemplateVar('GitHubRepo','https://github.com/AlexPAshton/Tempey/');
            SetTemplateVar('Punchline','A simple, bare-bones, templating framework.');
            SetTemplateVar('Title','{{ Tempey }}');
            SetTemplateVar('ContentTitle','Overview');
            SetTemplateVar('Content','Tempey came about after my search for a super light weight, bare-bones templating solution. Some pre-existing solutions come close, such as Twig, however they take the approach whereby the framework loads a template from a file (e.g. phtml), parses it and renders it to the user. In Tempey I turned this around so the html file, containing the template also spools up an instance of the templating engine to render itself. Due to the simplicity of this implementation the require line at the end of the file can easily be removed and the file used as a traditional template in frameworks like Twig. The reason for this structure is because it allows the framework to be utilised on a per page basis, with no real installation required.');
            SetTemplateVar('Content2','Below is a code snippet showcasing the simple syntax Tempey uses in a HTML file (the index page you\'re currently viewing!). The \'{%\' syntax represents control blocks and the \'{{\' syntax represents variables. When accessing variables it is possible to access properties of objects with the \'.\' operator.');          
            SetTemplateVar('Content3','Populating the tags in the above snippet are the variables that are set within a user made class. Below is an example of a class and how it can set the variables that the template engine can then use. It should be noted that this framework is made to work well with an object oriented approach to PHP development, as is showcased with the CoreFeature class, a model storing associated information on features as a series of properties.');

            SetTemplateVar('CodeExample','<org>{% for feature in CoreFeatures %}</org><br>    &lt;<cas>div</cas> class=&quot;card text-center&quot;&gt;<br>        &lt;<cas>div</cas> class=&quot;card-body&quot;&gt;<br>            &lt;<cas>h5</cas> class=&quot;card-title&quot;&gt;<org>{{ feature.title }}</org>&lt;<cas>/h5</cas>&gt;<br>            &lt;<cas>h6</cas> class=&quot;card-subtitle mb-2 text-muted&quot;&gt;<org>{{ feature.subtitle }}</org>&lt;<cas>/h6</cas>&gt;<br>            &lt;<cas>p</cas> class=&quot;card-text&quot;&gt;<org>{{ feature.description }}</org>&lt;<cas>/p</cas>&gt;<br>        &lt;<cas>/div</cas>&gt;<br>    &lt;<cas>/div</cas>&gt; <br>    &lt;br&gt;   <br><org>{% endfor %}</org>  ');
            SetTemplateVar('CodeExample2', '<cas>class</cas> <span>IndexService</span><br>{<br>        <cas>public function</cas> Run()<br>        {<br>            SetTemplateVar(\'CoreFeatures\', [<br>                <cas>new</cas> <span>CoreFeature</span>(&quot;{{ x }}&quot;, &quot;Simple Syntax&quot;, &quot;Use simple syntax to have your variables ...&quot;),<br>                <cas>new</cas> <span>CoreFeature</span>(&quot;{{ for x in y }}&quot;, &quot;Core Functionality&quot;, &quot;Outputting lists? No problem! Use ...&quot;),<br>                <cas>new</cas> <span>CoreFeature</span>(&quot;include(...)&quot;, &quot;Easy Implementation&quot;, &quot;Implement into any HTML page with the use of ...&quot;),<br>            ]);<br>            SetTemplateVar(\'ContentTitle\',\'Overview\');<br>        }<br>}');
        
            SetTemplateVar('Copyright','Tempey © 2020');
        }
    }
?>