<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: false
files: false
fields:
  title: 
    label: Name of group
    type:  text
  type:
    label: Type
    type: radio
    options:
      koinonia: Koinonia
      study: Bible Study
      training: Training
  time: 
    label: Meeting Day/Time
    type:  text
  leader: 
    label: Leader Name
    type:  text
  contact: 
    label: Contact
    type:  text