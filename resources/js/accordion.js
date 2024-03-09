const sidebarAccordions = document.querySelectorAll(".sidebar-accordion");

function toggleAccordion(accordion, wrapper, trigger) {
    const TIMEOUT = 2000;
    const COLLAPSED_CLASS = "sidebar-accordion-collapsed";

    if (!wrapper.classList.contains(COLLAPSED_CLASS)) {
        wrapper.classList.add("sidebar-accordion-collapsing");

        setTimeout(() => {
            wrapper.classList.remove("sidebar-accordion-collapsing");
        }, TIMEOUT);

        wrapper.classList.add(COLLAPSED_CLASS);
        trigger.setAttribute("data-state", "inactive");
    } else {
        wrapper.classList.add("sidebar-accordion-collapsing");

        setTimeout(() => {
            wrapper.classList.remove("sidebar-accordion-collapsing");
        }, TIMEOUT);

        wrapper.classList.remove(COLLAPSED_CLASS);
        trigger.setAttribute("data-state", "active");
    }
}

function calculateHeightVariables(accordion) {
    const content = accordion.querySelector(".sidebar-accordion-content");

    const contentHeight = content.offsetHeight;

    accordion.style.setProperty("--full-height", `${contentHeight}px`);
}

window.addEventListener("load", () => {
    sidebarAccordions.forEach(accordion => {
        calculateHeightVariables(accordion)

        accordion.querySelector(".sidebar-accordion-trigger")
        .addEventListener("click", (e) => {
            toggleAccordion(accordion, accordion.querySelector(".sidebar-accordion-wrapper"), e.target)
        });
    });
})