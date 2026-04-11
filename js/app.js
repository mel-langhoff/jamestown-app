console.log("JS LOADED 🔥");

// =========================
// ✂️ GET FIRST TWO SENTENCES
// =========================
function getFirstTwoSentences(html) {
  const text = html.replace(/<[^>]+>/g, "").trim();
  const matches = text.match(/[^.!?]+[.!?]+/g);

  if (matches && matches.length >= 2) {
    return `
      <p>${matches[0]} ${matches[1]}</p>
      <span class="read-more">Read more →</span>
    `;
  } else if (matches && matches.length === 1) {
    return `<p>${matches[0]}</p>`;
  } else {
    return `<p>${text}</p>`;
  }
}


// =========================
// 🚀 MAIN APP
// =========================
document.addEventListener("DOMContentLoaded", () => {

  console.log("DOM READY ✅");

  // =========================
  // 📰 LOAD POSTS
  // =========================
  const app = document.getElementById("app");

  if (app) {
    fetch(`/wp-json/jamestown/v1/posts?nocache=${Date.now()}`)
      .then(res => res.json())
      .then(posts => {

        if (!posts || posts.length === 0) {
          app.innerHTML = "<p>No posts found.</p>";
          return;
        }

        app.innerHTML = "";

        posts.forEach(post => {

          const card = document.createElement("a");
          card.href = post.link;
          card.className = "news-card";

          card.innerHTML = `
            <h3>${post.title?.rendered || "No title"}</h3>
            <div class="news-content">
              ${getFirstTwoSentences(post.excerpt?.rendered || "")}
            </div>
          `;

          app.appendChild(card);

        });

      })
      .catch(err => {
        console.error("FETCH ERROR:", err);
        app.innerHTML = "<p style='color:red;'>Error loading posts.</p>";
      });
  }


  // =========================
  // ✨ HERO ANIMATION
  // =========================
  const hero = document.getElementById("heroText");

  if (hero) {
    setTimeout(() => {
      hero.classList.add("animate");
    }, 200);
  }


  // =========================
  // 🍔 HAMBURGER MENU
  // =========================
  const toggle = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".nav-wrapper");

  if (toggle && nav) {
    toggle.addEventListener("click", () => {
      nav.classList.toggle("active");
    });
  }


// =========================
// 📱 MOBILE SUBMENU FIX
// =========================
if (window.innerWidth <= 768) {

  const links = document.querySelectorAll(".nav-menu > li > a");

  links.forEach(link => {
    const parent = link.parentElement;
    const submenu = parent.querySelector("ul");

    if (submenu) {
      link.addEventListener("click", (e) => {

        // if not already open → open it
        if (!parent.classList.contains("open")) {
          e.preventDefault();
          parent.classList.add("open");
        }

        // if already open → allow navigation (do nothing)
      });
    }
  });

}

// =========================
// 📱 MOBILE SUBMENU (OPTION B)
// =========================
if (window.innerWidth <= 768) {

  const links = document.querySelectorAll(".nav-menu > li > a");

  links.forEach(link => {
    const parent = link.parentElement;
    const submenu = parent.querySelector("ul");

    if (submenu) {
      link.addEventListener("click", (e) => {

        // if NOT open → open it
        if (!parent.classList.contains("open")) {
          e.preventDefault();

          // close others (accordion feel)
          document.querySelectorAll(".nav-menu > li").forEach(li => {
            li.classList.remove("open");
          });

          parent.classList.add("open");
        }

        // if already open → allow navigation
      });
    }
  });

}



  
  // =========================
  // 👉 SCROLL ARROWS
  // =========================
  const left = document.getElementById("scrollLeft");
  const right = document.getElementById("scrollRight");

  if (app && left && right) {
    const card = app.querySelector(".news-card");
    const scrollAmount = card ? card.offsetWidth + 20 : 300;

    right.addEventListener("click", () => {
      app.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });

    left.addEventListener("click", () => {
      app.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    });
  }

});
