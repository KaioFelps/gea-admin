const sidebarAccordions = document.querySelectorAll(".sidebar-accordion");

function toggleAccordion(accordion, wrapper, trigger) {
    const TIMEOUT = 2000;

    if (wrapper.style.height === "var(--full-height)") {
        wrapper.classList.add("sidebar-accordion-collapsing");

        setTimeout(() => {
            wrapper.classList.remove("sidebar-accordion-collapsing");
        }, TIMEOUT);

        wrapper.style.height = "0";
        trigger.setAttribute("data-state", "inactive");
    } else {
        wrapper.classList.add("sidebar-accordion-collapsing");

        setTimeout(() => {
            wrapper.classList.remove("sidebar-accordion-collapsing");
        }, TIMEOUT);

        wrapper.style.height = "var(--full-height)";
        trigger.setAttribute("data-state", "active");
    }
}

function calculateHeightVariables(accordion) {
    const trigger = accordion.querySelector(".sidebar-accordion-trigger");
    const wrapper = accordion.querySelector(".sidebar-accordion-wrapper");
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