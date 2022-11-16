

const collection = document.getElementsByClassName("sm-img");

let tmbArray = [...collection];
setActiveClass(tmbArray[0]);
const bigImage = document.getElementById('big-image');
function setFade(element) {
  element.classList.add('fade');
  setTimeout(() => {
    element.classList.remove('fade');
  }, 700);

}
function setSlideRight(element) {
  // element.classList.add('fade');
  element.classList.remove('sld-left');
  element.classList.add('sld-right');
  setTimeout(() => {
    // element.classList.remove('fade');
    element.classList.remove('sld-right');
    element.classList.remove('sld-left');
  }, 700);

}
function setSlideLeft(element) {
  // element.classList.add('fade');
  element.classList.remove('sld-right');
  element.classList.add('sld-left');
  setTimeout(() => {
    // element.classList.remove('fade');
    element.classList.remove('sld-left');
    element.classList.remove('sld-right');
  }, 700);

}
function setActiveClass(el) {
  el.classList.add('active-thumbnails');
}
function removeActiveClass(el) {
  el.classList.remove('active-thumbnails');
}


for (let item of collection) {
  item.addEventListener("click", () => {
    bigImage.src = item.dataset.src;
    setActiveClass(item);
    setFade(bigImage);
    for (let i of collection) {
      if (i != item) {
        removeActiveClass(i);
      }
    }
  });
}
// Starting slides contol

let slideIndex = 1;
function plusSlides(n) {
  showSlides(slideIndex += n);
  if (n == 1) {
    setSlideLeft(bigImage);
  } else {
    setSlideRight(bigImage);
  }
}
function currentSlide(slideIndex = n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  if (n > tmbArray.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = tmbArray.length;
  }
  let img = tmbArray[slideIndex - 1];

  bigImage.src = img.dataset.src;

  setActiveClass(img);
  tmbArray.forEach((item) => {
    if (item != img)
      removeActiveClass(item);
  });

}

// Arrow clicks

const prev = document.getElementById('prev-arrow')
const next = document.getElementById('next-arrow')
prev.addEventListener('click', (e) => {
  plusSlides(-1)
})
next.addEventListener('click', (e) => {
  plusSlides(1)
})

// Listener for sliding starts here
bigImage.addEventListener('touchstart', handleTouchStart, false);
bigImage.addEventListener('touchmove', handleTouchMove, false);

let x1 = null;
let y1 = null;

function handleTouchStart(e) {
  const firstTouch = e.touches[0];
  x1 = firstTouch.clientX;
  y1 = firstTouch.clientY;
}
function handleTouchMove(e) {
  if (!x1 || !y1) {
    return false;
  }
  let x2 = e.touches[0].clientX;
  let y2 = e.touches[0].clientY;
  let xDiff = x2 - x1;
  let yDiff = y2 - y1;

  if (Math.abs(xDiff) > Math.abs(yDiff)) {
    // Horizontal movement
    if (xDiff > 0) {
      plusSlides(-1);
      setSlideLeft(bigImage);
    }
    else {
      plusSlides(1);
      setSlideRight(bigImage);
    }
  } else {
    // Vertical movement
    if (yDiff > 0) console.log('Down');
    else console.log('Up');
  }
  x1 = null;
  y1 = null;
}
// End of swipe listening
// Start lightbox making

const lightbox = document.createElement('div');
lightbox.id = 'lightbox';
const box = document.getElementById('app')
box.appendChild(lightbox);

bigImage.addEventListener('click', e => {
  lightbox.classList.add('active-lightbox');
  const img = document.createElement('img');
  img.src = bigImage.src;
  while (lightbox.firstChild) {
    lightbox.removeChild(lightbox.firstChild);
  }
  lightbox.appendChild(img);
});
lightbox.addEventListener('click', e => {
  if (e.target !== e.currentTarget) return;
  console.log('clicked');
  lightbox.classList.remove('active-lightbox');
})
