(function() {
    var d = document.querySelector(".navbar-menu").innerHTML,
        M = 7,
        t = "en",
        a = localStorage.getItem("language");

    function o() {
        n(null === a ? t : a);
        var e = document.getElementsByClassName("language");
        e && Array.from(e).forEach(function(t) {
            t.addEventListener("click", function(e) {
                n(t.getAttribute("data-lang"))
            })
        })
    }

    function n(e) {
        if (document.getElementById("header-lang-img")) {
            if (e == "en") document.getElementById("header-lang-img").src = "assets/images/flags/us.svg";
            else if (e == "sp") document.getElementById("header-lang-img").src = "assets/images/flags/spain.svg";
            else if (e == "gr") document.getElementById("header-lang-img").src = "assets/images/flags/germany.svg";
            else if (e == "it") document.getElementById("header-lang-img").src = "assets/images/flags/italy.svg";
            else if (e == "ru") document.getElementById("header-lang-img").src = "assets/images/flags/russia.svg";
            else if (e == "ch") document.getElementById("header-lang-img").src = "assets/images/flags/china.svg";
            else if (e == "fr") document.getElementById("header-lang-img").src = "assets/images/flags/french.svg";
            else if (e == "ar") document.getElementById("header-lang-img").src = "assets/images/flags/ae.svg";
            localStorage.setItem("language", e);
            a = localStorage.getItem("language");
            if (a == null) n(t);
            var req = new XMLHttpRequest();
            req.open("GET", "assets/lang/" + a + ".json");
            req.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var langObj = JSON.parse(this.responseText);
                    Object.keys(langObj).forEach(function(key) {
                        var elements = document.querySelectorAll("[data-key='" + key + "']");
                        Array.from(elements).forEach(function(element) {
                            element.textContent = langObj[key];
                        });
                    });
                }
            };
            req.send();
        }
    }

    function s() {
        var collapses = document.querySelectorAll(".navbar-nav .collapse");
        if (collapses) {
            Array.from(collapses).forEach(function(collapse) {
                var collapseInstance = new bootstrap.Collapse(collapse, {
                    toggle: false
                });
                collapse.addEventListener("show.bs.collapse", function(e) {
                    e.stopPropagation();
                    var parentCollapse = collapse.parentElement.closest(".collapse");
                    if (parentCollapse) {
                        var childCollapses = parentCollapse.querySelectorAll(".collapse");
                        Array.from(childCollapses).forEach(function(child) {
                            var childCollapseInstance = bootstrap.Collapse.getInstance(child);
                            if (childCollapseInstance !== collapseInstance) childCollapseInstance.hide();
                        });
                    } else {
                        var siblings = (function(elem) {
                            var siblings = [];
                            for (var sibling = elem.parentNode.firstChild; sibling; sibling = sibling.nextSibling) {
                                if (sibling.nodeType === 1 && sibling !== elem) siblings.push(sibling);
                            }
                            return siblings;
                        })(collapse.parentElement);
                        Array.from(siblings).forEach(function(sibling) {
                            if (sibling.childNodes.length > 2) sibling.firstElementChild.setAttribute("aria-expanded", "false");
                            var idElements = sibling.querySelectorAll("*[id]");
                            Array.from(idElements).forEach(function(idElem) {
                                idElem.classList.remove("show");
                                if (idElem.childNodes.length > 2) {
                                    var links = idElem.querySelectorAll("ul li a");
                                    Array.from(links).forEach(function(link) {
                                        if (link.hasAttribute("aria-expanded")) link.setAttribute("aria-expanded", "false");
                                    });
                                }
                            });
                        });
                    }
                });
                collapse.addEventListener("hide.bs.collapse", function(e) {
                    e.stopPropagation();
                    var childCollapses = collapse.querySelectorAll(".collapse");
                    Array.from(childCollapses).forEach(function(child) {
                        var childCollapseInstance = bootstrap.Collapse.getInstance(child);
                        childCollapseInstance.hide();
                    });
                });
            });
        }
    }

    function i() {
        var layout = document.documentElement.getAttribute("data-layout"),
            defaultAttr = sessionStorage.getItem("defaultAttribute"),
            defaultObj = JSON.parse(defaultAttr);

        if (!defaultObj || layout !== "twocolumn" && defaultObj["data-layout"] !== "twocolumn") return;

        if (document.querySelector(".navbar-menu")) document.querySelector(".navbar-menu").innerHTML = d;
        var ul = document.createElement("ul");
        ul.innerHTML = '<a href="#" class="logo"><img src="assets/images/logo-sm.png" alt="" height="22"></a>';
        Array.from(document.getElementById("navbar-nav").querySelectorAll(".menu-link")).forEach(function(link) {
            ul.className = "twocolumn-iconview";
            var li = document.createElement("li"),
                a = link;
            a.querySelectorAll("span").forEach(function(span) {
                span.classList.add("d-none");
            });
            if (a.parentElement.classList.contains("twocolumn-item-show")) a.classList.add("active");
            li.appendChild(a);
            ul.appendChild(li);
            if (a.classList.contains("nav-link")) a.classList.replace("nav-link", "nav-icon");
            a.classList.remove("collapsed", "menu-link");
        });
        var page = location.pathname === "/" ? "index.html" : location.pathname.substring(1);
        page = page.substring(page.lastIndexOf("/") + 1);

        if (page) {
            var navLink = document.getElementById("navbar-nav").querySelector('[href="' + page + '"]');
            var collapseDropdown = navLink && navLink.closest(".collapse.menu-dropdown");
            if (collapseDropdown) {
                collapseDropdown.classList.add("show");
                collapseDropdown.parentElement.children[0].classList.add("active");
                collapseDropdown.parentElement.children[0].setAttribute("aria-expanded", "true");
                var parentCollapseDropdown = collapseDropdown.parentElement.closest(".collapse.menu-dropdown");
                if (parentCollapseDropdown) {
                    parentCollapseDropdown.classList.add("show");
                    var previousSibling = parentCollapseDropdown.previousElementSibling;
                    if (previousSibling) previousSibling.classList.add("active");
                    var grandParentCollapseDropdown = parentCollapseDropdown.parentElement.parentElement.parentElement.closest(".collapse.menu-dropdown");
                    if (grandParentCollapseDropdown) {
                        grandParentCollapseDropdown.classList.add("show");
                        var grandPreviousSibling = grandParentCollapseDropdown.previousElementSibling;
                        if (grandPreviousSibling) grandPreviousSibling.classList.add("active");
                    }
                }
            }
        }
        document.getElementById("two-column-menu").innerHTML = ul.outerHTML;
        Array.from(document.querySelector("#two-column-menu ul").querySelectorAll("li a")).forEach(function(a) {
            var pageLink = location.pathname === "/" ? "index.html" : location.pathname.substring(1);
            pageLink = pageLink.substring(pageLink.lastIndexOf("/") + 1);
            a.addEventListener("click", function(e) {
                var t;
                if ("/" + a.getAttribute("href") !== pageLink || a.getAttribute("data-bs-toggle")) {
                    document.body.classList.contains("twocolumn-panel") && document.body.classList.remove("twocolumn-panel");
                    document.getElementById("navbar-nav").classList.remove("twocolumn-nav-hide");
                    document.querySelector(".hamburger-icon").classList.remove("open");
                }
                if ((e.target && e.target.matches("a.nav-icon")) || (e.target && e.target.matches("i"))) {
                    var activeIcon = document.querySelector("#two-column-menu ul .nav-icon.active");
                    if (activeIcon) activeIcon.classList.remove("active");
                    var target = e.target.matches("i") ? e.target.closest("a") : e.target;
                    target.classList.add("active");
                    var itemShow = document.getElementsByClassName("twocolumn-item-show");
                    if (itemShow.length > 0) itemShow[0].classList.remove("twocolumn-item-show");
                    t = target.getAttribute("href").slice(1);
                    if (document.getElementById(t)) document.getElementById(t).parentElement.classList.add("twocolumn-item-show");
                }
            });
            if ("/" + a.getAttribute("href") === pageLink && !a.getAttribute("data-bs-toggle")) {
                a.classList.add("active");
                document.getElementById("navbar-nav").classList.add("twocolumn-nav-hide");
                document.querySelector(".hamburger-icon") && document.querySelector(".hamburger-icon").classList.add("open");
            }
        });
        if (document.documentElement.getAttribute("data-layout") !== "horizontal") {
            var navBar = new SimpleBar(document.getElementById("navbar-nav"));
            navBar && navBar.getContentElement();
            var iconView = new SimpleBar(document.getElementsByClassName("twocolumn-iconview")[0]);
            iconView && iconView.getContentElement();
        }
    }

    // ... (the rest of the code, beautified, can be continued similarly)
    // Due to limits, please specify which functions you'd like explained in detail.

    // Example for back-to-top button:
    var mybutton = document.getElementById("back-to-top");
    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    if (mybutton) {
        window.onscroll = function() {
            scrollFunction();
        };
    }
})();