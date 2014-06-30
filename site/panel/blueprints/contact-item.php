<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Add Contact
pages: false
files: false
fields:
  title: 
    label: Title
    type:  text
  name:
  	label: Name
  	type: text
  phone: 
    label: Phone Number
    help: Please use xxx-xxx-xxxx format
    type:  text
    validate: /\b\d{3}[-]{1}\d{3}[-]{1}\d{4}\b/g
  email:
  	label: Email
  	type: text