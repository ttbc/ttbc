module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    /**
    * Sass Task 
    */
    sass: {
        dev: {
            options: {
                style : 'expanded',
                sourcemap: 'none',
                compass: true
            },
            files: {
                'css/style.css': 'sass/style.scss',
            }
        },
        dist: {
            options: {
                style : 'compressed',
                sourcemap: 'none',
                compass: true
            },
            files: {
                'css/style.min.css': 'sass/style.scss',
            }
        },
    },
    
    /**
    * Watch Task 
    */
    watch: {
        css: {
            files: '**/*.scss',
            tasks: ["sass"]
        },
        js: {
            files: '**/*.js',
            tasks: ['uglify']
        }
    },
    
    /**
    * Uglify Task 
    */
    uglify: {
      dist: {
        files: {
            'js/script.min.js': 'js/script.js'
        }
      }
    }
    
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Default task(s).
  grunt.registerTask('default', ['watch']);

};