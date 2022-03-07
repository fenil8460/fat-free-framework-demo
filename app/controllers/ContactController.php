<?php
/**
 * User controller of sample applicaiton
 *
 * PHP version 5
 * 
 * @category PHP
 * @package  Fat-Free-PHP-Bootstrap-Site
 * @author   Mark Takacs <takacsmark@takacsmark.com>
 * @license  MIT 
 * @link     takacsmark.com
 */
 
 /**
 *  User controller class
 * 
 * @category PHP
 * @package  Fat-Free-PHP-Bootstrap-Site
 * @author   Mark Takacs <takacsmark@takacsmark.com>
 * @license  MIT 
 * @link     takacsmark.com
 */
 
class ContactController extends Controller
{
      
    function render()
    {
        $template=new Template;
        echo $template->render('index.htm');
    }

    
    function beforeroute()
    {
    }

    function addContact() 
    {
        $name = $this->f3->get('POST.name');
        $email = $this->f3->get('POST.email');
        $phone = $this->f3->get('POST.phone');
        $contact = new Contact($this->db);
        $contact->add($this->f3->get('POST'));
        $this->f3->reroute('/contact-report');
    }

    function contactReport()
    {
        $messages = new Contact($this->db);
        $this->f3->set('contacts', $messages->all());
        $template=new Template;
        echo $template->render('contactreport.htm');
    }

    function DeleteContact(\Base $f3, array $args = []):void
    {
        $id = $args['id'];
        $contact = new Contact($this->db);
        $contact->delete($id);
        $this->f3->reroute('/contact-report');
    }

}