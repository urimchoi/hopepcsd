<?php if(!defined('KIRBY')) exit ?>

# sermon blueprint

title: Profile
pages: false
files: true
fields:
  name: 
    label: Name
    required: true
    type:  text
  title: 
    label: Title
    required: true
    type:  text
  role:
    label: Role
    required: true
    type: radio
    options:
      leader: Leader
      staff: Staff
    default: leader
  bio:
    label: Bio
    required: false
    type: textarea
    size: large