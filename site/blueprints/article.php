<?php if(!defined('KIRBY')) exit ?>

title: Article
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
    width: 1/2
  subtitle:
    label: Subtitle
    type:  text
    width: 1/2
  startdate:
    label: Start date
    type: date
    format: dd-mm-yyyy
    width: 1/2
  enddate:
    label: Start date
    type: date
    format: dd-mm-yyyy
    width: 1/2
  text:
    label: Text
    type:  textarea