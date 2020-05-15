<?php
    class Person
    {
        public $name = "Alex Ashton";
        public $age = 22;
        public $sex = "male";
        public $bio = "default bio";

        public function __construct($name, $age, $sex, $bio)
        {
            $this->name = $name;
            $this->age = $age;
            $this->sex = $sex;
            $this->bio = $bio;
        }
    }

    class CoreFeature
    {
        public $title;
        public $subtitle;
        public $description;

        public function __construct($title, $subtitle, $description)
        {
            $this->title = $title;
            $this->subtitle = $subtitle;
            $this->description = $description;
        }
    }

    class IndexService
    {
        public function Run()
        {
            SetVar('CoreFeatures', [
                new CoreFeature("{{ x }}", "Simple Syntax", "Use simple syntax to have your variables inserted within your html code."),
                new CoreFeature("{{ for x in y }}", "Core Functionality", "Outputting lists? No problem! Use built in logic syntax to iterate over an array."),
                new CoreFeature("include(...)", "Easy Implementation", "Implement into any HTML page with the use of a php include at the bottom of the document."),
            ]);
            SetVar('People', [
                new Person("Alex", 22, "male", "A software developer."), 
                new Person("Bobbie", 32, "female", "An astronought.")
            ]);
            SetVar('Punchline','A simple, bare-bones, templating framework.');
            SetVar('Title','{{ Tempey }}');
            SetVar('ContentTitle','Overview');
            SetVar('Copyright','Tempey © 2020');
            SetVar('Content','Tempey came about after my search for a super light weight, bare-bones templating solution. Some pre-existing solutions come close, such as Twig, however they take the approach whereby the framework loads a template from a file (e.g. phtml), parses it and renders it to the user. In Tempey I turned this around so the html file, containing the template also spools up an instance of the templating engine to render itself. Due to the simplicity of this implementation the require line at the end of the file can easily be removed and the file used as a traditional tmeplate in frmaeworks like Twig. The reason for this structure is because it allows the framework to be utilised on a per page basis, with no real installation required.');
            SetVar('Content2','Below is a code snippet showcasing the simple syntax Tempey uses in a HTML file (the index page you\'re currently viewing!). The \'{%\' syntax represents control blocks and the \'{{\' syntax represents variables. When accessing variables it is possible to access properties of objects with the \'.\' operator.');          
            SetVar('Content3','Populating the tags in the above snippet are the variables that are set within a user made class. Below is an example of a class and how it can set the variables that the template engine can then use. It should be noted that this framework is made to work well with an object oriented approach to PHP development, as is showcased with the CoreFeature class, a model storing associated information on features as a series of properties.');

            SetVar('CodeExample','<org>{% for feature in CoreFeatures %}</org><br>    &lt;<cas>div</cas> class=&quot;card text-center&quot;&gt;<br>        &lt;<cas>div</cas> class=&quot;card-body&quot;&gt;<br>            &lt;<cas>h5</cas> class=&quot;card-title&quot;&gt;<org>{{ feature.title }}</org>&lt;<cas>/h5</cas>&gt;<br>            &lt;<cas>h6</cas> class=&quot;card-subtitle mb-2 text-muted&quot;&gt;<org>{{ feature.subtitle }}</org>&lt;<cas>/h6</cas>&gt;<br>            &lt;<cas>p</cas> class=&quot;card-text&quot;&gt;<org>{{ feature.description }}</org>&lt;<cas>/p</cas>&gt;<br>        &lt;<cas>/div</cas>&gt;<br>    &lt;<cas>/div</cas>&gt; <br>    &lt;br&gt;   <br><org>{% endfor %}</org>  ');
            SetVar('CodeExample2', '<cas>class</cas> <span>IndexService</span><br>{<br>        <cas>public function</cas> Run()<br>        {<br>            SetVar(\'CoreFeatures\', [<br>                <cas>new</cas> <span>CoreFeature</span>(&quot;{{ x }}&quot;, &quot;Simple Syntax&quot;, &quot;Use simple syntax to have your variables ...&quot;),<br>                <cas>new</cas> <span>CoreFeature</span>(&quot;{{ for x in y }}&quot;, &quot;Core Functionality&quot;, &quot;Outputting lists? No problem! Use ...&quot;),<br>                <cas>new</cas> <span>CoreFeature</span>(&quot;include(...)&quot;, &quot;Easy Implementation&quot;, &quot;Implement into any HTML page with the use of ...&quot;),<br>            ]);<br>        }<br>}');
        }
    }
?>