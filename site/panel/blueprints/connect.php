<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: 
  template:
    - connect-list
files: false
fields:
  intro: 
    label: Description
    type:  textarea
    size: large