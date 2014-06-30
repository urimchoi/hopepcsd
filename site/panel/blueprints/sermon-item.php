<?php if(!defined('KIRBY')) exit ?>

# sermon blueprint

title: Sermon Post
pages: false
files: true
fields:
  title: 
    label: Title
    required: true
    type:  text
  date:
  	label: Date
  	required: true
  	type: date
  	format: mm/dd/yy
  speaker:
    label: Speaker
    type: text
  books: 
    label: Related Books
    type:  tags
    index: siblings
    lower: true
  topic:
    label: Topic
    type: tags
    lower: true
  youtube:
    label: Youtube Link
    type: text