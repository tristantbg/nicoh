<?php if(!defined('KIRBY')) exit ?>

title: Site
fields:
  generalSettings:
    label: Site Settings
    type: headline
  title:
    label: Title
    type:  text
  description:
    label: Description
    type:  textarea
  keywords:
    label: Keywords
    type:  tags
  contacta1:
    label: Contact area 1
    type:  textarea
    width: 1/2
  contacta2:
    label: Contact area 2
    type:  textarea
    width: 1/2
  portfolio:
    label: Portfolio
    type:  select
    width: 1/2
  customcss:
    label: Custom CSS
    type: textarea
    buttons: false
  googleAnalytics:
    label: Google Analytics ID
    type: text
    icon: code
    help: Tracking ID in the form UA-XXXXXXXX-X. Keep this field empty if you are not using it.
    width: 1/2
  ogimage:
    label: Facebook OpenGraph image
    type: image
    help: 1200x630px minimum
    width: 1/2