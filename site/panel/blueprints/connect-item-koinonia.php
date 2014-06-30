<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Koinonia
pages: false
files: false
fields:
  title: 
    label: Name of group
    type:  text
  time: 
    label: Meeting Day/Time
    type:  text
  topic:
    label: Current Topic
    type: text
  contact: 
    label: Email Address
    type:  text
    validate: email
  phone: 
    label: Phone Number
    help: Please use xxx-xxx-xxxx format
    type:  text
    validate: /\b\d{3}[-]{1}\d{3}[-]{1}\d{4}\b/g