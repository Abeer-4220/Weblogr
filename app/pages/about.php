<title>About - <?= APP_NAME ?></title>
<?php include '../app/pages/includes/header.php'; ?>
<style>
    .about-container {
        max-width: 1050px;
        margin: auto;
        margin-top: 20px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
    }

    .about-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .about-content {
        margin-bottom: 20px;
    }

    .text {
        text-align: justify;
    }

    .my-img {
        border-radius: 100%;
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .my-img {
            max-width: 100%;
            width: 150px;
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<main>

    <div class="container about-container">

        <div class="about-title text-center">About Me</div>
        <div class="about-content text-center">
            <img src="<?= ROOT ?>/assets/images/my-image.jpg" alt="Abeer's Picture" class="mb-3 my-img" width="200px">

            <div class="about-content">
                <p class="text">
                    Hello! I'm <em><u>Muhammad Abeer Ansari</u></em>, an <strong>Aspiring Full Stack Web Developer</strong> with a keen eye for creating visually appealing and
                    user-friendly web interfaces. My journey in the world of web development has been both exciting and
                    rewarding.
                </p>
                <p class="text">
                    I specialize in crafting responsive and intuitive user experiences using the latest technologies and best
                    practices. My skills include <strong>HTML, CSS, JavaScript</strong>, and I want to become proficient in popular frontend frameworks like
                    React.js and Next.js.
                </p>
                <p class="text">
                    Continuously learning and staying up-to-date with industry trends, I strive to bring creativity and
                    innovation to every project. Whether it's designing pixel-perfect UIs or optimizing performance for a
                    seamless user journey, I'm dedicated to delivering high-quality solutions.
                </p>
                <p class="text">
                    Let's connect and explore the possibilities of creating exceptional web experiences together!
                </p>
            </div>
        </div>
    </div>

    <div class="container about-container">
        <div class="about-title text-center">About Weblogr</div>

        <div class="about-content">
            <p class="text">
                Welcome to Weblogr, your go-to platform for expressing thoughts, sharing knowledge, and connecting with a community of bloggers. In this digital space, we strive to provide a user-friendly and feature-rich environment for both bloggers and readers.
            </p>
            <p class="text">
                Weblogr enables registered users to create, edit, and manage their blogs effortlessly. Whether you're a seasoned writer or a passionate enthusiast, our platform offers a range of tools to enhance your blogging experience. From rich text formatting to categorizing your content, you have the flexibility to craft your narratives the way you envision.
            </p>
            <p class="text">
                For readers, Weblogr provides a seamless browsing experience. Discover a variety of blogs, search for specific topics or authors, and engage with the content through likes and comments. Follow your favorite bloggers to stay updated on their latest posts and be a part of a thriving blogging community.
            </p>
            <p class="text">
                With a commitment to security and privacy, Weblogr ensures the protection of user data through encryption and best security practices. Administrators manage content moderation to foster a positive and respectful online environment. Users can set their posts to private if they wish to limit access, and measures like CAPTCHA help prevent spam and abuse.
            </p>
            <p class="text">
                We believe in providing not just a blogging platform but a community where individuals can express, learn, and connect. Thank you for being a part of the Weblogr journey.
            </p>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="https://www.facebook.com/muhammadabeer.ansari.92/" target="_blank" class="btn btn-outline-primary social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/muhammadabeer.ansari.92/" target="_blank" class="btn btn-outline-danger social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/MAbeerAnsari1" target="_blank" class="btn btn-outline-info social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/muhammad-abeer-ansari-805a8a1b6/" target="_blank" class="btn btn-outline-primary social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/Abeer-4220" target="_blank" class="btn btn-outline-secondary social-icon"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>

    </div>

</main>

<?php include '../app/pages/includes/footer.php'; ?>