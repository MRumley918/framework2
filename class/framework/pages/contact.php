<?php
    namespace Framework\Pages;

    use \Config\Config as Config;
    use \Framework\Local as Local;

/**
 * A class that contains code to implement a contact page
 *
 * @author Lindsay Marshall <lindsay.marshall@ncl.ac.uk>
 * @copyright 2012-2016 Newcastle University
 *
 */
    class Contact extends \Framework\Siteaction
    {
/**
 * Handle various contact operations /contact
 *
 * @param object	$context	The context object for the site
 *
 * @return string	A template name
 */
        public function handle($context)
        {
            $fd = $context->formdata();
            if (($msg = $fd->post('message', '')) !== '')
            { # there is a post
                mail(Config::SYSADMIN, $fd->post('subject', 'No Subject'), $fd->post('sender', 'No Sender').PHP_EOL.PHP_EOL.$msg);
                $context->local()->message(Local::MESSAGE, 'Thank you. We will be in touch as soon as possible.');
            }
            return 'contact.twig';
        }
    }
?>
