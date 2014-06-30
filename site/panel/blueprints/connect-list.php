<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: 
  template:
    - connect-item-biblestudy
    - connect-item-training
    - connect-item-koinonia
    - connect-item-serve
files: true
fields:
  blurb: 
    label: Description
    type:  textarea
    size: large