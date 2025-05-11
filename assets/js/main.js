import "../css/input.css";
console.log("DojoPress theme JS loaded");

document.addEventListener("DOMContentLoaded", () => {
  const button = document.getElementById("mobile-menu-button");
  const menu = document.getElementById("mobile-menu");

  if (button && menu) {
    button.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  }

  const mode = document.body.dataset.themeMode;
  const toggles = document.querySelectorAll(".theme-toggle");

  const updateIcons = () => {
    const isDark = document.body.classList.contains("dark");
    const sunSVG =
      '<path d="M12 4a1 1 0 011 1v1a1 1 0 01-2 0V5a1 1 0 011-1zm5.657 1.757a1 1 0 011.414 1.414L18.485 8a1 1 0 11-1.414-1.414l.586-.586zM20 11a1 1 0 110 2h-1a1 1 0 110-2h1zm-2.343 6.243a1 1 0 11-1.414 1.414l-.586-.586a1 1 0 011.414-1.414l.586.586zM13 18a1 1 0 11-2 0v-1a1 1 0 112 0v1zm-6.243-1.757a1 1 0 11-1.414 1.414l-.586-.586a1 1 0 011.414-1.414l.586.586zM4 13a1 1 0 110-2H3a1 1 0 110 2h1zm1.757-6.243a1 1 0 111.414-1.414l.586.586a1 1 0 11-1.414 1.414l-.586-.586zM12 8a4 4 0 100 8 4 4 0 000-8z"/>';
    const moonSVG = '<path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/>';

    toggles.forEach((toggle) => {
      const icon = toggle.querySelector(".theme-icon");
      if (icon) {
        icon.innerHTML = isDark ? sunSVG : moonSVG;
      }
    });
  };

  if (mode === "auto") {
    const prefersDark = window.matchMedia(
      "(prefers-color-scheme: dark)"
    ).matches;
    const savedMode = localStorage.getItem("dojopress-color-mode");

    if (savedMode === "dark" || (!savedMode && prefersDark)) {
      document.body.classList.add("dark");
    }

    updateIcons();

    toggles.forEach((toggle) => {
      toggle.addEventListener("click", () => {
        document.body.classList.toggle("dark");
        const isDark = document.body.classList.contains("dark");
        localStorage.setItem("dojopress-color-mode", isDark ? "dark" : "light");
        updateIcons();
      });
    });
  } else if (mode === "dark") {
    document.body.classList.add("dark");
    updateIcons();
    localStorage.removeItem("dojopress-color-mode");
  } else if (mode === "light") {
    document.body.classList.remove("dark");
    updateIcons();
    localStorage.removeItem("dojopress-color-mode");
  }

  // Fade-in on scroll
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate-fade-in-up");
          entry.target.classList.remove("opacity-0");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1 }
  );

  document.querySelectorAll(".observed").forEach((el) => {
    observer.observe(el);
  });

  // Ensure hero fades in immediately on load
  const hero = document.querySelector(".hero");
  if (hero) {
    hero.classList.add("animate-fade-in-up");
    hero.classList.remove("opacity-0");
  }
});
