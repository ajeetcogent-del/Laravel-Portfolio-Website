<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Database\Seeder;

class PortfolioContentSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Website Design & Redesign',
                'description' => 'Responsive websites that explain your services clearly and make it easy for customers to contact you.',
                'icon' => 'fas fa-laptop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Landing Pages & Contact Forms',
                'description' => 'Focused service pages and simple forms that guide visitors toward a useful next step.',
                'icon' => 'fas fa-file-alt',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Local SEO & Google Business Profile',
                'description' => 'Accurate business details and helpful local pages that make it easier for nearby customers to find you.',
                'icon' => 'fas fa-map-marker-alt',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'AI Lead Capture & Follow-Up',
                'description' => 'Practical workflows to collect enquiries, send them to the right place, and organize follow-ups.',
                'icon' => 'fas fa-robot',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'CRM Setup & Appointment Booking',
                'description' => 'A clear way to keep customer enquiries organized and connect them with booking tools.',
                'icon' => 'fas fa-calendar-check',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Social Media & Website Performance',
                'description' => 'A practical content plan alongside improvements to website speed and mobile usability.',
                'icon' => 'fas fa-bullhorn',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(
                ['title' => $service['title']],
                $service
            );
        }

        $projects = [
            [
                'title' => 'Roofing Website Redesign',
                'slug' => 'roofing-website-redesign',
                'description' => 'Illustrative concept for a fictional roofing business, not completed client work. It shows clear service information and a simple route to request an estimate.',
                'problem' => 'A visitor should be able to understand the roofing services and find a clear way to make an enquiry.',
                'solution' => 'The concept organizes services, contact details, and the estimate request into a straightforward website.',
                'features' => ['Responsive homepage', 'Roofing service sections', 'Estimate enquiry call to action'],
                'order' => 1,
            ],
            [
                'title' => 'Local SEO Visibility Audit',
                'slug' => 'local-seo-visibility-audit',
                'description' => 'Illustrative audit for a fictional local service business, not completed client work. It outlines profile details and local website content to review.',
                'problem' => 'Customers need accurate business information and useful local service details when looking for nearby help.',
                'solution' => 'The sample audit groups business profile checks, local page content, and an ethical review process.',
                'features' => ['Business profile checklist', 'Local service page outline', 'Ethical review process'],
                'order' => 2,
            ],
            [
                'title' => 'Lead Follow-Up Automation',
                'slug' => 'lead-follow-up-automation',
                'description' => 'Illustrative workflow for a fictional clinic, not completed client work. It maps an enquiry through lead organization, booking, and follow-up.',
                'problem' => 'New enquiries can be difficult to track when contact details and next steps are spread across different places.',
                'solution' => 'The sample workflow shows how an enquiry can be captured, organized, and connected to a booking or follow-up step.',
                'features' => ['Enquiry capture', 'CRM lead record', 'Booking and follow-up steps'],
                'order' => 3,
            ],
            [
                'title' => 'Website Speed Improvement Plan',
                'slug' => 'website-speed-improvement-plan',
                'description' => 'Illustrative performance plan for a fictional service business, not completed client work. It focuses on practical page and mobile checks.',
                'problem' => 'Large page elements and difficult mobile layouts can make it harder for visitors to use a website.',
                'solution' => 'The sample plan prioritizes image sizing, page weight, and a review of the mobile experience.',
                'features' => ['Image sizing review', 'Page weight checklist', 'Mobile usability review'],
                'order' => 4,
            ],
            [
                'title' => 'Cleaning Service Landing Page',
                'slug' => 'cleaning-service-landing-page',
                'description' => 'Illustrative landing page for a fictional cleaning service, not completed client work. It presents the service clearly and guides visitors to enquire.',
                'problem' => 'A first-time visitor needs a quick way to understand the service and how to request information.',
                'solution' => 'The concept uses a focused page structure with service details, common questions, and a contact action.',
                'features' => ['Clear service summary', 'Frequently asked questions', 'Contact form call to action'],
                'order' => 5,
            ],
            [
                'title' => 'Wellness Appointment Booking Setup',
                'slug' => 'wellness-appointment-booking-setup',
                'description' => 'Illustrative booking setup for a fictional wellness studio, not completed client work. It shows a simple path from service information to an appointment request.',
                'problem' => 'Visitors should be able to understand available sessions and find the next step for booking.',
                'solution' => 'The concept connects service descriptions with a clear appointment request and confirmation flow.',
                'features' => ['Session information layout', 'Appointment request path', 'Confirmation and follow-up steps'],
                'order' => 6,
            ],
            [
                'title' => 'Social Media Content Plan',
                'slug' => 'social-media-content-plan',
                'description' => 'Illustrative content plan for a fictional home service business, not completed client work. It organizes useful post ideas into a simple calendar.',
                'problem' => 'Planning social posts can take time when topics and publishing dates are not organized.',
                'solution' => 'The sample plan groups short-form post ideas into a calendar that a business can review and adapt.',
                'features' => ['Short-form post ideas', 'Simple content calendar', 'Service-focused topics'],
                'order' => 7,
            ],
            [
                'title' => 'Home Repair CRM Lead Pipeline',
                'slug' => 'home-repair-crm-lead-pipeline',
                'description' => 'Illustrative CRM workflow for a fictional home repair business, not completed client work. It shows a simple way to organize new enquiries and next steps.',
                'problem' => 'A team needs a clear view of which enquiries are new, being handled, or waiting for a reply.',
                'solution' => 'The sample pipeline groups enquiries by their next action so the team can keep follow-ups organized.',
                'features' => ['New enquiry list', 'Simple lead stages', 'Follow-up reminders'],
                'order' => 8,
            ],
            [
                'title' => 'Dental Clinic Mobile Website Refresh',
                'slug' => 'dental-clinic-mobile-website-refresh',
                'description' => 'Illustrative mobile website concept for a fictional dental clinic, not completed client work. It makes key service and contact information easier to find on a phone.',
                'problem' => 'Phone visitors need readable service information and an easy way to contact the clinic.',
                'solution' => 'The concept prioritizes clear mobile navigation, readable page sections, and a visible contact action.',
                'features' => ['Mobile-first page layout', 'Clear service navigation', 'Easy-to-find contact details'],
                'order' => 9,
            ],
        ];

        foreach ($projects as $project) {
            Project::firstOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }
}
