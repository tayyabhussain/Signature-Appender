module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({


      phpmd: {
       application: {
        dir: "/home/coeus/Documents/EditorDriver.php"
      },
      options: {
       bin: 'vendor/bin/phpmd',
       rulesets: 'codesize'


     }
   }
   ,

   phpcs: {
    application: {
      dir: ['/home/coeus/Documents/EditorDriver.php']
    },
    options: {
      bin: 'vendor/bin/phpcs',
      standard: 'Zend'
    }
  }
  ,

  phpcpd: {
    application: {
      dir: '/home/coeus/Documents/*.php'
    },
    options: {
      bin: 'vendor/bin/phpcpd',
      quiet: true
    }
  }

  ,
  phpdocumentor: {
    dist: {
      options: {
        directory : './',
        target : 'docs'
      }
    }
  }
   
});

    // Load required modules
    grunt.loadNpmTasks('grunt-phpmd');
    grunt.loadNpmTasks('grunt-phpcs');
    grunt.loadNpmTasks('grunt-phpcpd');
    grunt.loadNpmTasks('grunt-phpdocumentor');

    // Task definitions
    grunt.registerTask('default', ['phpcs', 'phpmd','phpcpd','phpdocumentor']);
  };
