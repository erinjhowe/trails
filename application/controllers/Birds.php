<?php //dont close php tag in controllers and models. FYI: You do close php tags in views..
defined('BASEPATH') OR exit('No direct script access allowed');

class Birds extends CI_Controller {

	
	public function index()
	{
		
		// moving data from controller to view

		$data['heading'] = "The Birds of Alberta";
		$data['picture'] = "owl.jpg";
		$data['content'] = "<p>Birds (Aves), also known as avian dinosaurs, are a group of endothermic vertebrates, characterised by feathers, toothless beaked jaws, the laying of hard-shelled eggs, a high metabolic rate, a four-chambered heart, and strong yet lightweight skeleton.</p>
			<p>Birds live worldwide and range in size from the 5 cm (2 in) bee hummingbird to the 2.75 m (9 ft) ostrich. They rank as the class of tetrapods with the most living species, at approximately ten thousand, with more than half of these being passerines, sometimes known as perching birds. As a subgroup of Reptilia, birds are the closest living relatives of crocodilians, while birds and crocodilians together are the last living representatives of Archosaurs.</p>";


		$this->load->view('includes/header');  
		$this->load->view('bird_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');


	}// \index

	public function loon(){
		$data['heading'] = "The Loon";
		$data['picture'] = "loon.jpg";
		$data['content'] = "<p>The loon, the size of a large duck or small goose, resembles these birds in shape when swimming. Like ducks and geese but unlike coots (which are Rallidae) and grebes (Podicipedidae), the loon's toes are connected by webbing. The bird may be confused with cormorants (Phalacrocoracidae), which are not too distant relatives of divers and like them are heavy set birds whose bellies – unlike those of ducks and geese – are submerged when swimming.</p>
		<p>Flying loons resemble plump geese with seagulls' wings that are relatively small in proportion to the bulky body. The bird points its head slightly upwards during swimming, but less so than cormorants. In flight the head droops more than in similar aquatic birds.</p>";

		$this->load->view('includes/header');  
		$this->load->view('bird_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');
	}// \loon

	public function falcon(){
		$data['heading'] = "The Falcon";
		$data['picture'] = "falcon.jpg";
		$data['content'] = "<p>Falcons are birds of prey in the genus Falco, which includes about 40 species. Falcons are widely distributed on all continents of the world except Antarctica (though closely related raptors did occur there in the Eocene).</p>

			<p>Adult falcons have thin, tapered wings, which enable them to fly at high speed and change direction rapidly. Fledgling falcons, in their first year of flying, have longer flight feathers, which make their configuration more like that of a general-purpose bird such as a broadwing. This makes it easier to fly while learning the exceptional skills required to be effective hunters as adults.</p>";

		$this->load->view('includes/header');  
		$this->load->view('bird_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');
	}// \falcon

	public function sparrow(){
		$data['heading'] = "The Sparrow";
		$data['picture'] = "sparrow.jpg";
		$data['content'] = "<p>Sparrows are a family of small passerine birds, Passeridae. They are also known as true sparrows, or Old World sparrows, names also used for a particular genus of the family, Passer.</p>
		<p>They are distinct from both the American sparrows, in the family Emberizidae, and from a few other birds sharing their name, such as the Java sparrow of the family Estrildidae. Many species nest on buildings, and the house and Eurasian tree sparrows in particular inhabit cities in large numbers, so sparrows are among the most familiar of all wild birds. They are primarily seed-eaters, though they also consume small insects. Some species scavenge for food around cities and, like gulls or rock doves, will happily eat virtually anything in small quantities.</p>";

		$this->load->view('includes/header');  
		$this->load->view('bird_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');
	}// \sparrow

} // \Birds
