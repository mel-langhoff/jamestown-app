document.addEventListener("DOMContentLoaded", () => {
  const app = document.getElementById("app");

  let page = 1;
  const perPage = 10;

  // container for posts
  const postsContainer = document.createElement("div");
  app.appendChild(postsContainer);

  // load more button
  const loadMoreBtn = document.createElement("button");
  loadMoreBtn.innerText = "Load More";
  loadMoreBtn.style.margin = "20px auto";
  loadMoreBtn.style.display = "block";

  app.appendChild(loadMoreBtn);

  function fetchPosts() {
    loadMoreBtn.innerText = "Loading...";

    fetch(`https://api.allorigins.win/raw?url=https://jamestownco.org/wp-json/wp/v2/posts?per_page=${perPage}&page=${page}`)
      .then(res => {
        if (!res.ok) throw new Error("No more posts");
        return res.json();
      })
      .then(posts => {
        posts.forEach(post => {
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
      .catch(() => {
        loadMoreBtn.innerText = "No more posts";
        loadMoreBtn.disabled = true;
      });
  }

  // first load
  fetchPosts();

  // click to load more
  loadMoreBtn.addEventListener("click", fetchPosts);
});