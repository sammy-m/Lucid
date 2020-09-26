
/* jshint esversion: 6*/
window.onload = ()=>{
	"use strict";
	var menuBtn = document.getElementById('menuBtn');
	var menu = document.getElementById('menuList');
	var nav = document.getElementsByTagName('nav');
	//navigation links
	var home = document.getElementById('home');
	var about = document.getElementById('about');
	var work = document.getElementById('work');
	var workTogether = document.getElementById('wt');
	var contacts = document.getElementById('contacts');
	//content-scroll
	var phome = document.getElementById('phome');
	var pabout = document.getElementById('pabout');
	var pwork = document.getElementById('pwork');
	var pcontacts = document.getElementById('pcontacts');

	//auto scrolls
	home.addEventListener('click', ()=>{
		phome.scrollIntoView({
			behavior: 'smooth'
		});
		setVisible(-1);
	});
	about.addEventListener('click', ()=>{
		pabout.scrollIntoView({
			behavior: 'smooth'
		});
		setVisible(-1);
	});
	work.addEventListener('click', ()=>{
		pwork.scrollIntoView({
			behavior: 'smooth'
		});
		setVisible(-1);
	});
	contacts.addEventListener('click', ()=>{
		//console.log(pcontacts);
		//document.documentElement.scrollTop = pcontacts;
		pcontacts.scrollIntoView({
			behavior: 'smooth'
		});
		setVisible(-1);

	});

	workTogether.addEventListener('click', ()=>{
		//document.documentElement.scrollTop = pcontacts;
		pcontacts.scrollIntoView({
			behavior: 'smooth'
		});
		
	});
	//active menu
				//var href = window.location.href;
	
	//end of active menu
	//console.log(menu);
	//text typing animation
	var salut = document.getElementById('greet');
	var salutText = 'Hello!';
	var salutSpeed = 50;
	var s = 0, n = 0;
	var name = document.getElementById('nm');
	//var nameText = 'I am Sam.';
	var nameText = document.getElementById('nameText').innerHTML;

	function write() {
		if (s < salutText.length){
			salut.innerHTML += salutText.charAt(s);
			++s;
			setTimeout(write,salutSpeed);
		}
	} write();
	function writen() {
		if (n < nameText.length){
			name.innerHTML += nameText.charAt(n);
			++n;
			setTimeout(writen,salutSpeed+100);
			
		}
	} writen();
	//setInterval(writen, 1000);

	menuBtn.addEventListener('click', ()=>{
		//alert(menu.style.display);
		menu.classList.contains('visible-menu') ? setVisible(-1) : setVisible(1);
	});

	function setVisible(cond) {
			if (cond === 1) {
				//menu.style.display = 'block';
				menu.classList.add('visible-menu');
				nav[0].classList.add('nav-tinted');
			} else if (cond === -1) {
				//menu.style.display = '';
				menu.classList.remove('visible-menu');
				if (document.documentElement.scrollTop < nav[0].clientHeight){
				nav[0].classList.remove('nav-tinted');
				}
			}
	}

	if(document.documentElement.scrollTop > nav[0].clientHeight){
			nav[0].classList.add('nav-tinted'); }

	document.addEventListener('scroll', () =>{
		if(document.documentElement.scrollTop > nav[0].clientHeight){
			nav[0].classList.add('nav-tinted');
			//console.log(nav[0]);
		} else if (document.documentElement.scrollTop < nav[0].clientHeight){
			nav[0].classList.remove('nav-tinted');
		}
	//	console.log(pabout.getBoundingClientRect().top +''+ -pabout.clientHeight);
		if(pwork.getBoundingClientRect().top <= 0 && pwork.getBoundingClientRect().top >= -pwork.clientHeight){
			work.classList.add('active-link');
			home.classList.remove('active-link');
			about.classList.remove('active-link');
			contacts.classList.remove('active-link');
		} else if(phome.getBoundingClientRect().top <= 0 && phome.getBoundingClientRect().top >= -phome.clientHeight){
			home.classList.add('active-link');
			work.classList.remove('active-link');
			about.classList.remove('active-link');
			contacts.classList.remove('active-link');
		} else if(pabout.getBoundingClientRect().top <= 0 && pabout.getBoundingClientRect().top >= -pabout.clientHeight){
			//alert("here");
			about.classList.add('active-link');
			home.classList.remove('active-link');
			work.classList.remove('active-link');
			contacts.classList.remove('active-link');
		} else if(pcontacts.getBoundingClientRect().top <= 0 && pcontacts.getBoundingClientRect().top >= -pcontacts.clientHeight){
			contacts.classList.add('active-link');
			home.classList.remove('active-link');
			about.classList.remove('active-link');
			work.classList.remove('active-link');
		}
	});

	 AOS.init();
}