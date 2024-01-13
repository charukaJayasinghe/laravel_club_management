<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  background: #f2f2f2;
  font-family: "proxima-soft", san-serif;
  font-size: 14px;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
}
a {
  text-decoration: none;
  font-weight: 600;
  color: #000;
  font-weight: 500;
}
.container {
  max-width: 800px;
  min-width: 640px;
  margin: 0 auto;
}
header {
  height: 53px;
  display: flex;
  align-items: center;
  flex-direction: column;
  margin: 50px 0;
}
header h1 {
  font-size: 24px;
  font-weight: 400;
  color: #333;
  padding: 0;
  margin: 0 0 15px;
}
header span i.fa {
  color: #e74c3c;
}
header span {
  font-size: 12px;
  color: #333;
}
main {
  display: flex;
}
.normal,
.hover {
  flex: 1;
  padding: 0 25px;
}
.demo-title {
  color: #666;
  margin: 0 0 15px;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
}
.module {
  min-width: 270px;
  height: 470px;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.15);
  transition: all 0.3s linear 0s;
  overflow: hidden;
  position: relative;
}
.module:hover {
  box-shadow: 0 1px 35px 0 rgba(0, 0, 0, 0.3);
}
.thumbnail {
  position: relative;
  overflow: hidden;
  background: black;
}
.thumbnail img {
  width: 120%;
  transition: all 0.3s;
}
.module:hover .thumbnail img {
  transform: scale(1.1);
  opacity: 0.6;
}

.thumbnail .date {
  position: absolute;
  top: 20px;
  right: 20px;
  background: #e74c3c;
  padding-top: 10px;
  color: #fff;
  font-weight: bold;
  border-radius: 100%;
  height: 55px;
  width: 55px;
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 12px;
  text-transform: uppercase;
}
.date div:first-child {
  font-size: 18px;
  line-height: 1.2;
}
.content {
  position: absolute;
  width: 100%;
  height: 178px;
  bottom: 0;
  background: #fff;
  padding: 30px;
  transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
}
.module:hover .content {
  height: 278px;
}

.content .category {
  position: absolute;
  top: -34px;
  left: 0;
  color: #fff;
  text-transform: uppercase;
  background: #e74c3c;
  padding: 10px 15px;
  font-weight: bold;
}
.title {
  margin: 0;
  padding: 0 0 10px;
  color: #333333;
  font-size: 24px;
  font-weight: 700;
}
.sub-title {
  margin: 0;
  padding: 0 0 20px;
  color: #e74c3c;
  font-size: 20px;
  font-weight: 400;
}
.description {
  color: #666666;
  font-size: 14px;
  line-height: 1.8em;
  height: 0;
  opacity: 1;
  transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  overflow: hidden;
}
.module:hover .description {
  height: 100px;
}
.meta {
  margin: 30px 0 0;
  color: #999999;
}

</style>
<body>
    <div class='container'>
        <header>
          <h1>Article News Card</h1>
          <span>
            Made with
            <i class='fa fa-heart animated infinite pulse'></i>
            by
            <a href="#">Kenny Zuo</a>
            Designed by
            <a href="#">JustinKwak</a>
          </span>
        </header>
        <main>
          <div class='normal'>
            <p class='demo-title'>Normal</p>
            <div class='module'>
              <div class='thumbnail'>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg">
                <div class='date'>
                  <div>27</div>
                  <div>Mar</div>
                </div>
              </div>
              <div class='content'>
                <div class="category">Photos</div>
                <h1 class='title'>City Lights in New York</h1>
                <h2 class='sub-title'>The city that never sleeps.</h2>
                <div class="description">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</div>
                <div class="meta">
                  <span class="timestamp">
                    <i class='fa fa-clock-o'></i> 6 mins ago
                  </span>
                  <span class="comments">
                    <i class='fa fa-comments'></i>
                    <a href="#"> 39 comments</a>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class='hover'>
            <p class='demo-title'>Hover</p>
            <div class='module'>
              <div class='thumbnail'>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg">
                <div class='date'>
                  <div>27</div>
                  <div>Mar</div>
                </div>
              </div>
              <div class='content'>
                <div class="category">Photos</div>
                <h1 class='title'>City Lights in New York</h1>
                <h2 class='sub-title'>The city that never sleeps.</h2>
                <p class="description">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
                <div class="meta">
                  <span class="timestamp">
                    <i class='fa fa-clock-o'></i> 6 mins ago
                  </span>
                  <span class="comments">
                    <i class='fa fa-comments'></i>
                    <a href="#"> 39 comments</a>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
</body>
</html>

