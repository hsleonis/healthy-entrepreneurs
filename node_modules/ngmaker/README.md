ngMaker
=========

Author: MD. Hasan Shahriar
Version: 1.0.1

A small script providing utility methods to create Angular JS project directory structure
> It will make necessary folders for different files in MVC pattern
> Create example main files like: index.js, style.css etc
> Download the LATEST version of angular js for your project

## Directory structure
```````
	Project folder -->
			angular -->
				- directives
				- controllers
				- services
				- library
				- core
				- router
				app.js
			resources -->
				- css
				- js
				- img
				- fonts
			templates
			index.html 
````````

## Installation
  
  You will require 'node' to use ngmaker.

  npm install ngmaker --save

## Usage

  var ngmaker = require('ngmaker');
  ngmaker.init();

## License
   MIT License

## Release History

* 1.0.1 Initial release
