// Simple tab navigation for sections
document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".nav-btn");
  const sections = document.querySelectorAll(".section");

  buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const targetId = btn.getAttribute("data-section");

      // Update button active state
      buttons.forEach((b) => b.classList.remove("active"));
      btn.classList.add("active");

      // Show the matching section, hide others
      sections.forEach((sec) => {
        if (sec.id === targetId) {
          sec.classList.add("visible");
        } else {
          sec.classList.remove("visible");
        }
      });
    });
  });
});
