<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Training
pages: false
files: false
fields:
  title: 
    label: Name of group
    type:  text
  contact: 
    label: Email Address
    type:  text
    validate: email