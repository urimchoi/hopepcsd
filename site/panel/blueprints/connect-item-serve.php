<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Serve
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
      inreach: In-reach
      outreach: Out-Reach
      upreach: Up-Reach
      education: Education
  leader: 
    label: Leader Name
    type:  text
  contact: 
    label: Contact
    type:  text