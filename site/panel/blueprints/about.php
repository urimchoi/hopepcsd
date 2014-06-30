<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: 
  template: profile
files: true
fields:
  title: 
    label: Title
    type:  text
  text: 
    label: Text
    type:  textarea
    size:  large
  experience:
  	label: Recent Experience
  	type: textarea
  	size: small
  inspiration:
  	label: Inspiration
  	type: textarea
  	size: small