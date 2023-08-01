        setInterval("my_function();",3000); 
        function my_function(){
          $('#refresh').load(location.href + ' #refresh');
        }