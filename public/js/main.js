document.addEventListener("DOMContentLoaded", () => {
    navbarScroll();
    smoothScroll();
    activeMenu();
    mobileMenu();
    revealAnimation();
    heroParallax();
    progressBar();
});

function navbarScroll(){
    const navbar = document.querySelector(".navbar-custom");
    if(!navbar) return;
    window.addEventListener("scroll",()=>{
        if(window.scrollY > 80){
            navbar.classList.add("scrolled");
        }else{
            navbar.classList.remove("scrolled");
        }
    });
}

function smoothScroll(){
    document.querySelectorAll('a[href^="#"]').forEach(anchor=>{
        anchor.addEventListener("click",function(e){
            const target=document.querySelector(this.getAttribute("href"));
            if(!target) return;
            e.preventDefault();
            window.scrollTo({
                top:target.offsetTop-90,
                behavior:"smooth"
            });
        });
    });
}

function activeMenu(){
    const sections=document.querySelectorAll("section[id]");
    const navLinks=document.querySelectorAll(".navbar-nav .nav-link");
    if(sections.length===0) return;

    window.addEventListener("scroll",()=>{
        let current="";
        sections.forEach(section=>{
            const top=section.offsetTop-150;
            const height=section.offsetHeight;
            if(scrollY>=top){
                current=section.getAttribute("id");
            }
        });

        navLinks.forEach(link=>{
            link.classList.remove("active");
            if(link.getAttribute("href")==="#"+current){
                link.classList.add("active");
            }
        });
    });
}

function mobileMenu(){
    const navLinks=document.querySelectorAll(".navbar-collapse .nav-link");
    const navbar=document.querySelector(".navbar-collapse");
    navLinks.forEach(link=>{
        link.addEventListener("click",()=>{
            if(window.innerWidth<992){
                bootstrap.Collapse.getOrCreateInstance(navbar).hide();
            }
        });
    });
}

function revealAnimation(){
    const observer=new IntersectionObserver(entries=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){
                entry.target.classList.add("show");
            }
        });
    },{
        threshold:.18
    });

    document.querySelectorAll(
        ".hero-content,.hero-image,.feature-item"
    ).forEach(el=>{
        el.classList.add("hidden");
        observer.observe(el);
    });
}

function heroParallax(){
    const hero=document.querySelector(".hero-image img");
    if(!hero) return;
    window.addEventListener("scroll",()=>{
        const offset=window.scrollY*0.08;
        hero.style.transform=`translateY(${offset}px)`;
    });
}

function progressBar(){
    const progress=document.createElement("div");
    progress.className="progress-scroll";
    document.body.appendChild(progress);
    window.addEventListener("scroll",()=>{
        const height=document.documentElement.scrollHeight-window.innerHeight;
        const progressWidth=(window.scrollY/height)*100;
        progress.style.width=progressWidth+"%";
    });
}

function animateCounter(){
    const counters=document.querySelectorAll("[data-counter]");
    counters.forEach(counter=>{
        const target=+counter.dataset.counter;
        let value=0;
        const speed=target/120;
        const update=()=>{
            value+=speed;
            if(value<target){
                counter.innerText=Math.ceil(value);
                requestAnimationFrame(update);
            }else{
                counter.innerText=target;
            }
        };
        update();
    });
}

window.addEventListener("load",()=>{
    animateCounter();
});