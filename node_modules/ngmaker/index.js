/* =======================================
    ngMaker | Angular project folder maker
      _  _  ___   __  __   _   _  _____ ___ 
     | \| |/ __| |  \/  | /_\ | |/ / __| _ \
     | .` | (_ | | |\/| |/ _ \| ' <| _||   /
     |_|\_|\___| |_|  |_/_/ \_\_|\_\___|_|_\
                                        
    Description: This cute script will make angular project folder for large to small projects,
    include latest angular version to your project
    Author: Md. Hasan Shahriar
    Email: hsleonis2@gmail.com
    Url: http://github.com/hsleonis
======================================= */

var fs = require('fs');
var path = require('path');
var Git = require("nodegit");

var dir = 'angular';

var mkFile = function(dir, file, data){
    data=(typeof data !== 'undefined')?', '+data:'';
    dir=(dir==='')?'':(dir+'/');

    fs.mkdir(dir,function(e){
        if (typeof file !== 'undefined') {
            fs.writeFile(dir+file, '/* '+dir+' -> '+file+' file'+data+' */', function (err) {
              if (err) throw err;
            });
        }
    });
};

module.exports = {
    init: function(){
        fs.mkdir(dir,function(e){
            if(!e || (e.code === 'EEXIST')){
                mkFile('','index.html','<p>NG MAKER | MD. HASAN SHAHRIAR</p>');
                mkFile(dir+'/directives','main.dic.js');
                mkFile(dir+'/services','main.ser.js');
                mkFile(dir+'/controllers','main.ctrl.js');
                mkFile(dir+'/router','router.js','/* Router file */');
                mkFile(dir,'app.js','/* Angular app file */');
                fs.mkdir(dir+'/library',function(e){});
                fs.mkdir(dir+'/core',function(e){
                    console.info('Adding latest version of Angular JS...');
                    Git.Clone('https://github.com/angular/bower-angular', dir+'/core').then(function(repository){
                        console.info('Completed');
                    });
                });
            } else {
                //debug
                console.log(e);
            }
        });
        fs.mkdir('templates',function(e){});
        fs.mkdir('resources',function(e){
            mkFile('resources/css','style.css');
            mkFile('resources/js','main.js');
            mkFile('resources/img');
            mkFile('resources/fonts');
        });
    }
};