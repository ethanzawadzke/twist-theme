<footer class="footer-container">
  <div class="footer-width">
    <div class="footer-logo"></div>
    <div class="footer-content-container">
      <section class="footer-left">
        <div class="footer-subscribe-container">
          <h2 class="footer-subscribe-header">Subscribe</h2>
          <p class="footer-subscribe-body">
            Subscribe now and stay up to date with our latest insights
          </p>
          <form class="subscribe-form" id="subscribe-form-footer">
              <input type="email" id="email-input-main" class="email-input-main" placeholder="Email address">
              <button id="subscribe-button" class="subscribe-button" type="submit"><span>Subscribe</span></button>
          </form>
        </div>
      </section>
      <section class="footer-right">
        <nav class="footer-nav-links">
          <a href="<?php echo home_url('/about'); ?>">About</a>
          <a href="<?php echo home_url('/services'); ?>">Services</a>
          <a href="<?php echo home_url('/our-clients'); ?>">Our Clients</a>
          <a href="<?php echo home_url('/insights'); ?>">Insights</a>
          <a href="<?php echo home_url('/contact'); ?>">Contact</a>
        </nav>
        <address class="footer-address">
          Fort Worth, Texas, 76147<br>
          P.O. Box 470930<br>
          505.699.5167
        </address>
      </section>
    </div>
    <div class="footer-bottom-container">
      <div class="footer-copyright">
        &copy; 2021-2023 Plot Twist Consulting
      </div>
    </div>
  </div>
</footer>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            strings: [
                'Transforming',
                'Automating',
                'Pioneering',
                'Engineering',
                'Optimizing',
                'Innovating',
                'Advancing',
                'Empowering',
                'Redefining',
                'Elevating',
            ],
            typeSpeed: 50,
            backSpeed: 50,
            backDelay: 2200,
            loop: true,
            loopCount: Infinity
        };

        var typed = new Typed('#typed', options);
    });

    /* document.addEventListener("DOMContentLoaded", function () {
        const ctaButton = document.getElementById("stickyButton");
        const ctaContainer = document.querySelector(".cta-container");
        let initialButtonBottom = ctaButton.getBoundingClientRect().bottom;
        let buttonHeight = ctaButton.offsetHeight;

        window.addEventListener("scroll", function () {
            const ctaContainerBottom = ctaContainer.getBoundingClientRect().bottom;

            if (ctaContainerBottom < initialButtonBottom) {
                ctaButton.style.bottom = (initialButtonBottom - ctaContainerBottom + buttonHeight) + "px";
            } else {
                ctaButton.style.bottom = "2rem";
            }
        });
    }); */

document.addEventListener("DOMContentLoaded", function () {
  var navContainer = document.querySelector(".about-us-nav-container");
  var navContainerOffsetTop = navContainer.offsetTop;
  var navButtons = document.querySelectorAll(".about-us-nav-btn");
  var sections = Array.from(document.querySelectorAll(".about-us-section-container"));

  function updateActiveButton() {
  // Check which section is currently visible in the viewport
  var currentSection = sections.find((section) => {
    var sectionTop = section.getBoundingClientRect().top;
    // Include a tolerance of a few pixels for the first section
    var tolerance = section.id === "what-we-do" ? 5 : 0;
    return sectionTop > -tolerance && sectionTop < window.innerHeight * 0.5;
  });

  // Update the active button
  if (currentSection) {
    navButtons.forEach((button) => {
      var target = button.getAttribute("data-target");
      if (currentSection.matches(target)) {
        button.classList.add("active");
      } else {
        button.classList.remove("active");
      }
    });
  }
}

  window.addEventListener("scroll", function () {
    if (window.pageYOffset >= navContainerOffsetTop) {
      navContainer.classList.add("sticky");
    } else {
      navContainer.classList.remove("sticky");
    }

    updateActiveButton();
  });

  // Update the active button on page load
  updateActiveButton();

  // Add click event listener to each nav button
  navButtons.forEach((button) => {
    button.addEventListener("click", function () {
      var target = button.getAttribute("data-target");
      var targetSection = document.querySelector(target);

      // Smoothly scroll to the corresponding section
      targetSection.scrollIntoView({ behavior: "smooth" });
    });
  });
});




function applyStaggeredAnimation(selector, delayIncrement = 0.1, onVisible) {
  var elements = document.querySelectorAll(selector);

  elements.forEach(function (element, index) {
    var delay = index * delayIncrement;
    element.style.setProperty("--animation-delay", delay + "s");

    if (onVisible) {
      onVisible(element, delay);
    } else {
      setTimeout(function () {
        element.classList.add("animate");
      }, delay * 1000);

      setTimeout(function () {
        element.style.setProperty("--animation-delay", (delay + 0.5) + "s");
      }, (delay + 0.5) * 1000);
    }
  });
}

function animateOnVisible(element, delay) {
  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          setTimeout(function () {
            element.classList.add("animate");
          }, delay * 1000);
          observer.disconnect();
        }
      });
    },
    { threshold: 0.5 } // Trigger when 50% of the element is visible
  );

  observer.observe(element);
}

document.addEventListener("DOMContentLoaded", function () {
  applyStaggeredAnimation(".hero-nav-button", 0.1, animateOnVisible);
  applyStaggeredAnimation(".service", 0.1, animateOnVisible);
  applyStaggeredAnimation(".call-to-action", 0.1, animateOnVisible);
  applyStaggeredAnimation(".about-us-img", 0.1, animateOnVisible);
  applyStaggeredAnimation(".subservice-list-item", 0.1, animateOnVisible);
});
</script>

</body>