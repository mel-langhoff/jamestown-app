console.log("JS WORKING 🔥");

// =========================
// ✂️ GET FIRST TWO SENTENCES
// =========================
function getFirstTwoSentences(html) {
  const text = html.replace(/<[^>]+>/g, "").trim();

  // match sentences
  const matches = text.match(/[^.!?]+[.!?]+/g);

  let result = "";

  if (matches && matches.length >= 2) {
    result = matches[0] + " " + matches[1];
  } else if (matches && matches.length === 1) {
    result = matches[0];
  } else {
    result = text;
  }

  return `
    <p>${result}</p>
    <span class="read-more">Read more →</span>
  `;
}


// =========================
// 🚀 MAIN LOAD
// =========================
document.addEventListener("DOMContentLoaded", () => {

  // =========================
  // 📰 POSTS
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

});

document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("app");
  const arrow = document.getElementById("scrollArrow");

  if (container && arrow) {
    arrow.addEventListener("click", () => {
      container.scrollBy({
        left: 300,
        behavior: "smooth"
      });
    });
  }
});

