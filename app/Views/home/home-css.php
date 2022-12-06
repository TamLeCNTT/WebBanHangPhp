<style>
  .card-body {
    vertical-align: middle;
    padding: 4px;
  }

  .card-img-top {
    width: 94%;
  }

  .img-fluid {
    width: 304px;
    height: 255px;
  }

  /* Responsive */
  ::-webkit-scrollbar {
    width: 8px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

  * {
    margin: 0;
    padding: 0;
  }

  .cards {

    align-items: center;
    height: 413px;
    width: 300px;
    background-color: #fff;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
    position: relative;
    transition: 1s;
  }

  .cards:hover {
    transform: scale(1.05);
    z-index: 2;
  }

  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 999;
  }

  .overlay .fa-close {
    position: absolute;
    top: 10px;
    right: 10px;
    color: rgb(90, 23, 23);

  }

  .overlay img {
    object-fit: cover;
    transition: all 2s;
    height: 100%;
    width: 100%;
  }

  .d-none {
    display: none;
  }

  .top-div {
    position: relative;
    padding: 20px;
    font-size: 17px;
    color: #fff;
    z-index: 1;
  }

  .top-div i:nth-child(1) {
    top: 158px;
    position: absolute;
    transition: all 0.5s;
    left: -20px;
  }

  .top-div i:nth-child(2) {
    position: absolute;
    top: 158px;
    right: -20px;
    transition: all 0.5s;

  }

  .cards:hover i:nth-child(1) {
    top: 180x;
    left: 170px;
  }

  .cards:hover i:nth-child(2) {
    right: 170px;
  }

  .image {
    margin-top: -20px;
    display: flex;
    align-items: center;
    flex-direction: column;
    height: 180px;
    width: 100%;
  }

  .image span {
    height: 100px;
    width: 120px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background-color: #ccc;
    border: 3px solid #fff;
    z-index: 100;
  }

  .image span img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;

  }

  .image h3 {
    margin-top: 10px;
    font-weight: 900;
    font-size: 18px;
    z-index: 100;
    color: #fff;
  }

  .arc {
    display: flex;
    position: relative;
  }

  .arc span {
    height: 580px;
    width: 580px;
    background-image: linear-gradient(to bottom, #7af346, #626262);
    position: absolute;
    right: -135px;
    top: -590px;

  }

  .about {
    margin-top: -40px;
    padding: 40px 20px;
  }

  .about i:nth-child(1) {
    font-weight: 600;
    height: 20px;
  }

  .about i:nth-child(2) {
    font-size: 13px;
    padding-right: 10px;
    height: 20px;
  }

  .list-group button:nth-child(1) {
    margin-top: -5px;
    margin-left: 4px;
    position: absolute;
    background-color: cornflowerblue;
    border-radius: 10%;
    height: 40px;
    width: 130px;
  }

  .list-group input:nth-child(2) {
    margin-top: -5px;
    margin-left: 154px;
    font-size: 20px;
    height: 40px;
    width: 95px;
    border-radius: 10%;
  }

  .list-group {
    margin-left: -20px;
    width: 298px;
  }

  .card-header {
    margin-left: -30px;
    width: 295px;
  }

  a {
    text-decoration: none;
  }

  /* Responsive */
  @media only screen and (max-width: 740px) {
    .cards {
      margin-left: 25px;
      width: 300px !important;
      height: 420px !important;
    }
  }

  /* IP XR */
  @media only screen and (max-width: 840px) {
    .cards {
      margin-left: 40px;
      width: 300px !important;
      height: 420px !important;
    }
  }


  /* Pixel 5 */
  @media only screen and (max-width: 400px) {
    .cards {
      margin-left: 30px;
      width: 300px !important;
      height: 420px !important;
    }
  }

  /* IP SE */
  @media only screen and (max-width: 390px) {
    .cards {
      margin-left: 25px;
      width: 300px !important;
      height: 420px !important;
    }
  }

  /* iPad Mini */
  @media only screen and (min-width:740px) and (max-width: 1024px) {
    .cards {
      margin-left: 15px;
      height: 420px !important;
    }
  }

  @media only screen and (max-width: 740px) {
    .img-fluid1 {
      width: 350px !important;
      height: 228px !important;
    }

    .card-body {
      padding-left: 49px;
    }

    .soluong {
      width: 90px;
    }
  }
</style>