
const nav = document.querySelector("#mainNav");
const sectionTestimonials = document.querySelector("#Testimonials");

document.onmousemove(()=>{
    alert("Mouse Moved")
});


const sectionOneOptions = {
    rootMargin: "-200px 0px 0px 0px"
};

const sectionObserver = new IntersectionObserver(function(
    entries,
    sectionOneObserver
    ) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                console.log("OBSERVER!!!!!!!!!!!!!!!!!!")
                alert("OBSERVER MANNNNNN")
                nav.classList.add("nav-scrolled");
            } else {
                nav.classList.remove("nav-scrolled");
            }
        });
    },
    sectionOneOptions);

sectionObserver.observe(sectionTestimonials);
