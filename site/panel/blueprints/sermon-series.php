<?php if(!defined('KIRBY')) exit ?>

# sermon blueprint

title: Sermon Series
pages: 
  template: sermon-item
files: false
fields:
  title: 
    label: Title
    required: true
    type:  text
  synopsis:
  	label: Synopsis
  	required: true
  	type: textarea
  	textarea: large
  books:
    label: Related Books
    type: tags
    index: template
    lower: true
  topic:
    label: Topic
    type: tags
    lower: true
