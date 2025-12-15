/** Image Magnifier Glass / zoom d'une image
 * https://www.w3schools.com/howto/howto_js_image_magnifier_glass.asp
 */

class Magnifier {
    #img;
    #zoom;
    #glass;
    #bw;
    #w;
    #h;

    constructor(img, zoom) {
        this.#img = img;
        this.#zoom = zoom;

        this.magnify();
    }

    magnify() {

        /* Create magnifier glass: */
        this.#glass = document.createElement("DIV");
        this.#glass.setAttribute("class", "img-magnifier-glass");

        /* Insert magnifier glass: */
        this.#img.parentElement.insertBefore(this.#glass, this.#img);

        /* Set background properties for the magnifier glass: */
        this.#glass.style.backgroundImage = "url('" + this.#img.src + "')";
        this.#glass.style.backgroundRepeat = "no-repeat";
        this.#glass.style.backgroundSize = (this.#img.width * this.#zoom) + "px " + (this.#img.height * this.#zoom) + "px";
        this.#bw = 3;
        this.#w = this.#glass.offsetWidth / 2;
        this.#h = this.#glass.offsetHeight / 2;

        /* Execute a function when someone moves the magnifier glass over the image: */
        this.#glass.addEventListener("mousemove", this.#moveMagnifier.bind(this));
        this.#img.addEventListener("mousemove", this.#moveMagnifier.bind(this));

        /*and also for touch screens:*/
        this.#glass.addEventListener("touchmove", this.#moveMagnifier.bind(this));
        this.#img.addEventListener("touchmove", this.#moveMagnifier.bind(this));
    }

    #moveMagnifier(event) {
        let pos, x, y;
        /* Prevent any other actions that may occur when moving over the image */
        event.preventDefault();

        /* Get the cursor's x and y positions: */
        pos = this.#getCursorPos(event);
        x = pos.x;
        y = pos.y;

        /* Prevent the magnifier glass from being positioned outside the image: */
        if (x > this.#img.width - (this.#w / this.#zoom)) { x = this.#img.width - (this.#w / this.#zoom); }
        if (x < this.#w / this.#zoom) { x = this.#w / this.#zoom; }
        if (y > this.#img.height - (this.#h / this.#zoom)) { y = this.#img.height - (this.#h / this.#zoom); }
        if (y < this.#h / this.#zoom) { y = this.#h / this.#zoom; }

        /* Set the position of the magnifier glass: */
        this.#glass.style.left = (x - this.#w) + "px";
        this.#glass.style.top = (y - this.#h) + "px";

        /* Display what the magnifier glass "sees": */
        this.#glass.style.backgroundPosition = "-" + ((x * this.#zoom) - this.#w + this.#bw) + "px -" + ((y * this.#zoom) - this.#h + this.#bw) + "px";
    }

    #getCursorPos(event) {
        let a, x = 0, y = 0;

        /* Get the x and y positions of the image: */
        a = this.#img.getBoundingClientRect();

        /* Calculate the cursor's x and y coordinates, relative to the image: */
        x = event.pageX - a.left;
        y = event.pageY - a.top;

        /* Consider any page scrolling: */
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return { x: x, y: y };
    }
}

export default Magnifier;
