
document.addEventListener('DOMContentLoaded', function() {
    let btnGfu = document.getElementById('btn-gfu');

    btnGfu.addEventListener('click', alertForExternalSite)

    console.log("Hello from script.js");
    console.log(btnGfu);
})
document.addEventListener('DOMContentLoaded', function (){
    document.querySelector('.card .btn').addEventListener('click', alertForExternalSite)
})
function alertForExternalSite(event) {
    event.preventDefault();

    let confirmed = confirm("You are about to leave this site. Do you want to continue?");

    if(confirmed){
        let url = event.target.href;
        window.open(url, '_blank');
    }
    // alert("This will take you to an external site.");
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.card .btn');
    let li = document.createElement('li');
    li.textContent = "New Item";
    // document.querySelector('.skills').appendChild(li);
})

let moreSkills = ["JavaScript", "HTML", "CSS", "c#", "SQL", ];
document.addEventListener('DOMContentLoaded',function() {
    let link = document.querySelector('.skills li.add-skill');


    document.querySelector('.skills li:first-child').classList.add('highlight');

    link.addEventListener('click', function(event) {
      event.preventDefault();

        let li = document.createElement('li');
        li.textContent = moreSkills.pop();

      let sikllsList = document.querySelector('.skills');
      let children = sikllsList.children;
      let lastSkill = children[children.length - 1];
      sikllsList.insertBefore(li, lastSkill);


      if(0=== moreSkills.length){
          link.style.display = 'none';
      }

    })
})

document.addEventListener('DOMContentLoaded', function() {
  let darkModeBtn = document.querySelector('#toggel-dark-mode ');
  darkModeBtn.style.display = 'block';

  darkModeBtn.addEventListener('click', function() {

        document.body.classList.toggle('dark');
        let currentText = darkModeBtn.textContent;
        darkModeBtn.textContent = darkModeBtn.dataset.label;
        darkModeBtn.dataset.label = currentText;
  })

})