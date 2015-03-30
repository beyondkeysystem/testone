<?php 

if($Page == 'Home' or $Page == '' or $Page == 'Login'){
	if($Check_Admin == 1){ 
            include("aho-ui/content/ac.php");
	}else{
            include("aho-ui/content/login.php");
	}

}
if($Page == 'Registration'){
	include("aho-ui/content/reg.php");
}
if($Page == 'Forgot'){
	include("aho-ui/content/for.php");
}
if($Page == 'Accounts'){
	if($Check_Admin == 1){
		include("aho-ui/content/ac.php");
	}else{
		include("aho-ui/content/login.php");
	}
}

if($Page == 'Contact'){
	include("aho-ui/content/cont.php");
}
if($Page == 'Upgrade'){
	include("aho-ui/content/upg.php");
}
if($Page == 'Thanks'){
	include("aho-ui/content/thn.php");
}
if($Page == 'Cancel'){
	include("aho-ui/content/can.php");
}
if($Page == 'Contacts'){
	include("aho-ui/content/contacts.php");
}
if($Page == 'FindAgent'){
	include("aho-ui/content/findagent.php");
}

if($Page == 'credits'){
	include("aho-ui/content/credits.php");
}
if($Page == 'cancel'){
	include("aho-ui/content/cancel.php");
}
/*starts here*/
if($Page == 'brokers'){
    include("aho-ui/content/brokers.php");
}

if($Page == 'FindBroker'){
	include("aho-ui/content/findbroker.php");
}
if($Page == 'Agents'){
	include("aho-ui/content/agents.php");
}

/*ends here*/
if($Page == 'FindBrokerAgents'){
	include("aho-ui/content/br_agents.php");
}
if($Page == 'AgentContacts'){
	include("aho-ui/content/agent_contacts.php");
}
/*1-05-2014*/
if($Page == 'AllAgents'){
	include("aho-ui/content/all_agents.php");
}
if($Page == 'FindAllAgents'){
	include("aho-ui/content/find_all_agents.php");
}
if($Page == 'Subscription'){
	include("aho-ui/content/subscription.php");
}
if($Page == 'AdminLogin'){
	if($Check_Admin == 1){
            include("aho-ui/content/ac.php");
	}else{
            include("aho-ui/content/admin_login.php");
	}

}
/*1-05-2014*/


?>
    </div>
</section>
