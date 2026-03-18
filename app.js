document.addEventListener("DOMContentLoaded", () => {
  const app = document.getElementById("app");
  const searchBtn = document.getElementById("searchBtn");
  const searchInput = document.getElementById("searchInput");
  const titleEl = document.getElementById("title");

  let page = 1;
  const perPage = 10;
  let currentQuery = "";

  const postsContainer = document.createElement("div");
  app.appendChild(postsContainer);

  const loadMoreBtn = document.createElement("button");
  loadMoreBtn.innerText = "Load More";
  loadMoreBtn.style.display = "block";
  loadMoreBtn.style.margin = "40px auto";
  app.appendChild(loadMoreBtn);

  function fetchPosts(reset = false) {
    if (reset) {
      page = 1;
      postsContainer.innerHTML = "";
    }

    const url = `https://corsproxy.io/?https://jamestownco.org/wp-json/wp/v2/posts?per_page=${perPage}&page=${page}&search=${currentQuery}`;

    fetch(url)
      .then(res => res.json())
      .then(posts => {
        console.log("POSTS:", posts);

        if (!posts || posts.length === 0) {
          loadMoreBtn.innerText = "No more posts";
          loadMoreBtn.disabled = true;
          return;
        }

        posts.forEach((post, index) => {
          const globalIndex = (page - 1) * perPage + index;

          // 👉 insert image every 2 posts
          if (globalIndex > 0 && globalIndex % 2 === 0) {
            const imageSection = document.createElement("div");
            imageSection.className = "parallax";

            const images = [
              "https://jamestownco.org/wp-content/uploads/2026/03/hero_image.png",
              "https://jamestownco.org/wp-content/uploads/2026/03/porphyry-scaled.png"
            ];

            const imgIndex = Math.floor(globalIndex / 2) % images.length;
            imageSection.style.backgroundImage = `url('${images[imgIndex]}')`;

            postsContainer.appendChild(imageSection);
          }

          // 👉 post
          const card = document.createElement("div");
          card.className = "card";

          card.innerHTML = `
            <h2>${post.title.rendered}</h2>
            <div>${post.excerpt.rendered}</div>
          `;

          postsContainer.appendChild(card);
        });

        page++;
        loadMoreBtn.innerText = "Load More";
      })
      .catch(err => {
        console.error("FETCH ERROR:", err);
        loadMoreBtn.innerText = "Error loading posts";
      });
  }

  // initial load
  fetchPosts();

  // load more
  loadMoreBtn.addEventListener("click", () => fetchPosts());

  // search
  searchBtn.addEventListener("click", () => {
    currentQuery = searchInput.value;
    fetchPosts(true);
  });

  searchInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      currentQuery = searchInput.value;
      fetchPosts(true);
    }
  });

  // ✨ typewriter title
  const text = "Town of Jamestown";
  let i = 0;

  function typeWriter() {
    if (i < text.length) {
      titleEl.innerHTML += text.charAt(i);
      i++;
      setTimeout(typeWriter, 80);
    }
  }

  typeWriter();
});