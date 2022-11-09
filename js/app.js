var btns = document.querySelectorAll('#btn');
var closeBtn1 = document.querySelector('.fa-x');
var closeBtn2 = document.querySelector('.fa-bars');
var sideBar = document.querySelector('.sidebar');
var currentTheme = document.querySelector('.current div');
var otherThemes = document.querySelectorAll('.theme div');

//
// function sendMail() {
//   var link = "mailto:me@example.com"
//            + "?cc=myCCaddress@example.com"
//            + "&subject=" + encodeURIComponent("This is my subject")
//            + "&body=" + encodeURIComponent(document.getElementById('myText').value)
//   ;
  
//   window.location.href = link;
// }
// function sendEmail() {
//   Email.send({
//       SecureToken: "security token of your smtp",
//       To: "someone@gmail.com",
//       From: "someone@gmail.com",
//       Subject: "Subject...",
//       Body: document.getElementById('text').value
//   }).then( 
//       message => alert("mail sent successfully")
//   );
// }