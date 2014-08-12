module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({


      phpmd: {
       application: {
        dir: "./"
      },
      options: {
       bin: 'vendor/bin/phpmd',
       suffixes: 'php',
       exclude: 'docs, node_module, vendor',
       rulesets: 'naming'

     }
   }
   ,

   phpcs: {
    application: {
      dir: ['EditorDriver.php','Editor.php']
    },
    options: {
      bin: 'vendor/bin/phpcs',
      standard: 'Zend'
    }
  }
  ,

  phpcpd: {
    application: {
      dir: ['*.php']
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
  ,
  shell: {                                
      listFolders: {                      // Target directory
        options: {                     
          stderr: false
        },
          command: 'php phpdcd.phar *.php' // to run php dcd through shell 
        }
      },

      phpdcd: {
        application: {
          dir: ['*.php']
        },
        options: {
          namesExclude: 'config.php,settings.php',
          bin:'vendor/bin/phpdcd'
        }
      }

    });

    // Load required modules
    grunt.loadNpmTasks('grunt-phpmd');
    grunt.loadNpmTasks('grunt-phpcs');
    grunt.loadNpmTasks('grunt-phpcpd');
    grunt.loadNpmTasks('grunt-phpdocumentor');
    grunt.loadNpmTasks('grunt-phpdcd');
    grunt.loadNpmTasks('grunt-shell');


    // Task definitions
    grunt.registerTask('default', ['phpcs', 'phpmd','phpcpd','phpdocumentor','shell','phpdcd']);
  };
