<?php 
    //Page Name Default home
    $page_name = 'home';
    //If page_name Query Set
    if(isset($_GET['page_name'])) {
        //Give $page_name The Page Name From Query page_name
        $page_name = $_GET['page_name'];
    }
    //If id Query Set
    if(isset($_GET['id'])) {
        //Use Database To Fetch The Speaker Using The ID
        $servername = "localhost";
        $username = "admin";
        $password = "7UshE6U;WZqw";
        $dbname = "i9759699_hkmz1";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM speakers WHERE id='".$_GET['id']."'";
        $result = $conn->query($sql);
        $name = "";
        $description = "";
        $image = "";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $description = $row['description'];
                $image = $row['image'];
            }
        }
        $conn->close();
    }
    $page_title = "Energy Summit 2024 | UPES Dehradun ";
    $page_keywords = "energy summit 2024, upes energy summit, energy summit 2023, energy transition, sustainable future, global energy, renewable energy, clean technologies, energy policies, climate change mitigation, energy innovation, green economy, UPES Dehradun, Energy Cluster, hybrid conference,";
    $page_description = "Join us at ICNETS 2024, the premier international conference on navigating the global energy transition for a sustainable future. Hosted by the Energy Cluster at SoAE, UPES, Dehradun, this hybrid event brings together experts and innovators from around the world to explore key strategies, technologies, and policies shaping the energy landscape. Don't miss this opportunity to drive impactful change towards a greener, more resilient future.";
    switch($page_name) {
        case 'home':
            $page_title = "Energy Summit 2024 | UPES Dehradun";
            $page_keywords = "energy transition, sustainable future, global energy, renewable energy, clean technologies, energy policies, climate change mitigation, energy innovation, green economy, UPES Dehradun, Energy Cluster, hybrid conference, environmental sustainability, energy industry trends, sustainable development";
            $page_description = "Join us at ICNETS 2024, the premier international conference on navigating the global energy transition for a sustainable future. Hosted by the Energy Cluster at SoAE, UPES, Dehradun, this hybrid event brings together experts and innovators from around the world to explore key strategies, technologies, and policies shaping the energy landscape. Don't miss this opportunity to drive impactful change towards a greener, more resilient future.";
            break;
        case 'about':
            $page_title = "About | Energy Summit 2024 | UPES";
            $page_keywords = "Energy Cluster, UPES Dehradun, energy research, sustainable energy, environmental sustainability, energy education, industry partnerships, renewable energy, clean technologies, energy innovation, energy experts, energy projects, energy initiatives, energy solutions, energy sustainability";
            $page_description = "Discover the vision and mission driving the Energy Cluster at UPES Dehradun. Learn about our commitment to navigating the global energy transition for a sustainable future through innovative research, education, and industry partnerships. Explore our team's expertise, projects, and contributions to shaping the energy landscape towards environmental sustainability and societal well-being.";
            break;
        case 'advisory':
            $page_title = "Advisory Committee | Energy Summit 2024 | UPES";
            $page_keywords = "Advisory Committee, Energy Cluster, UPES Dehradun, industry leaders, academics, experts, energy strategies, sustainability, global energy landscape, forward-thinking, guidance, insight";
            $page_description = "Meet the esteemed members of the Advisory Committee at the Energy Cluster, UPES Dehradun. Comprised of industry leaders, academics, and experts, our committee provides invaluable guidance and insight to drive forward-thinking strategies in navigating the global energy landscape towards sustainability.";
            break;
        case 'organising':
            $page_title = "Organising Committee | Energy Summit 2024 | UPES";
            $page_keywords = "Organising Committee, Energy Cluster, UPES Dehradun, event management, collaboration, energy transition, sustainability, global energy, discussions, teamwork";
            $page_description = "Discover the dedicated team behind the scenes at the Energy Cluster, UPES Dehradun. Our Organising Committee comprises passionate individuals committed to orchestrating successful events, fostering collaboration, and advancing discussions on global energy transition and sustainability.";
            break;   
        case 'accomodation':
            $page_title = "Accomodation | Energy Summit 2024 | UPES";
            $page_keywords = "Accommodation, Energy Summit, UPES Dehradun, hostel, lodging, conference attendees, nearby, comfortable, affordable, local amenities, transportation";
            $page_description = "Plan your stay conveniently during the Energy Summit at UPES Dehradun. Explore nearby hostel accommodation options just outside the campus, offering comfortable and affordable lodging for conference attendees. Experience hassle-free access to the event venue while enjoying the convenience of local amenities and transportation.";
            break; 
        case 'speakers':
            $page_title = "Speakers | Energy Summit 2024 | UPES";
            $page_keywords = "Speakers, Energy Summit, Energy Cluster, UPES Dehradun, expertise, insights, perspectives, global energy landscape, sustainability, valuable contributions";
            $page_description = "Explore the diverse lineup of speakers at the Energy Summit, hosted by the Energy Cluster at UPES Dehradun. Our esteemed speakers represent a wide array of expertise, offering valuable insights and perspectives on navigating the complexities of the global energy landscape towards a sustainable future.";
            break;  
        case 'speaker-details':
            $page_title = "".$name." | Energy Summit 2024 | UPES";
            $page_keywords = "".$name.", energy transition, sustainable future, global energy, renewable energy, clean technologies, energy policies, climate change mitigation, energy innovation, green economy, UPES Dehradun, Energy Cluster, hybrid conference, environmental sustainability, energy industry trends, sustainable development";
            $page_description = implode(' ', array_slice(str_word_count($description,1), 0, 30));
            break;   
        default: 
    }

?>
<?php include './includes/header.php'; ?>


<?php 
    switch($page_name) {
        case 'home':
            include './includes/pages/home.php';
            break;
        case 'about':
            include './includes/pages/about.php';
            break;
        case 'advisory':
            include './includes/pages/advisory.php';
            break;
        case 'organising':
            include './includes/pages/organising.php';
            break;   
        case 'accomodation':
            include './includes/pages/accomodation.php';
            break; 
        case 'speakers':
            include './includes/pages/speakers.php';
            break;  
        case 'speaker-details':
            include './includes/pages/speaker-details.php';
            break;   
        default: 
            include './includes/pages/404.php';
    }

?>

<?php include './includes/footer.php' ?>