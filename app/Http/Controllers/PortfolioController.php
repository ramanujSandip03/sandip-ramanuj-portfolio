<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Display the main portfolio page.
     */
    public function index(): View
    {
        $personal = [
            'name' => 'Sandip Ramanuj',
            'title' => 'Laravel Developer',
            'location' => 'Ghatlodiya, Ahmedabad, Gujarat',
            'experience_years' => '1.5+ Years',
            'email' => 'ramanujsandip876@gmail.com',
            'phone' => '+91 70411 44652',
            'linkedin' => 'https://www.linkedin.com/in/sandip-ramanuj-a5a45b302',
        ];

        $aboutSummary = "Laravel Developer with 1.5+ years of experience building and maintaining web applications using PHP, Laravel, and MySQL. Experienced in backend development, REST API development, and admin panel development, with hands-on experience integrating and customizing GPT-based features. Skilled in building scalable systems, implementing automation using cron jobs, and managing role-based access systems with multiple user hierarchies.";

        $stats = [
            ['label' => 'Years Experience', 'value' => '1.5+'],
            ['label' => 'Companies', 'value' => '2'],
            ['label' => 'Projects Delivered', 'value' => '10+'],
        ];

        $skills = [
            'Backend Development' => ['PHP', 'Laravel'],
            'Frontend' => ['HTML', 'CSS', 'JavaScript', 'jQuery', 'AJAX'],
            'CSS Frameworks' => ['Tailwind CSS', 'Bootstrap'],
            'Database' => ['MySQL', 'Elasticsearch'],
            'Tools & Editors' => ['Git', 'GitLab', 'VS Code', 'PhpStorm', 'Sublime Text'],
            'Soft Skills' => ['Problem Solving', 'Teamwork', 'Communication', 'Time Management'],
        ];

        $experience = [
            [
                'company' => 'Tilva Artsoft',
                'role' => 'Laravel Developer',
                'duration' => 'October 2024 – November 2025',
                'projects' => [
                    [
                        'name' => 'Piplana Pane (Core Product)',
                        'highlights' => [
                            'Upgraded project from Laravel 10 to Laravel 11 (code refactoring and dependency updates).',
                            'Developed backend: routes, controllers, models, and business logic.',
                            'Improved APIs with bug fixes, performance optimizations, and response restructuring.',
                            'Implemented frontend updates using Tailwind CSS.',
                            'Built GST invoice automation system for monthly billing and email delivery.',
                        ],
                    ],
                    [
                        'name' => 'Admin Panel Development',
                        'highlights' => [
                            'Implemented Business Groups and Agent management modules.',
                            'Built user management and system configuration sections.',
                            'Added filters, search, and pagination for data-heavy views.',
                        ],
                    ],
                    [
                        'name' => 'Simply Shutters',
                        'highlights' => [
                            'Implemented Excel-based bulk product import system.',
                            'Optimized pagination and lazy loading for large datasets.',
                        ],
                    ],
                    [
                        'name' => 'Vikash Pen World',
                        'highlights' => [
                            'Developed complete cart-to-order workflow (cart, checkout, order placement).',
                            'Implemented order processing and management backend.',
                            'Built Contact Us form with CAPTCHA integration.',
                        ],
                    ],
                    [
                        'name' => 'Internal Application',
                        'highlights' => [
                            'Developed complete GST Invoice Module with CRUD and GST calculation.',
                            'Implemented search filters, invoice generation, print, and PDF download.',
                            'Performed query optimization and backend performance improvements.',
                        ],
                    ],
                ],
            ],
            [
                'company' => 'Digiprix Web Solution LLP',
                'role' => 'Laravel Developer',
                'duration' => 'December 2025 – Present',
                'projects' => [
                    [
                        'name' => 'mytravelpa.ai',
                        'highlights' => [
                            'Developed backend modules for a travel automation platform.',
                            'Integrated GPT APIs for dynamic travel content generation.',
                            'Implemented AI response handling and database storage.',
                            'Managed travel data for hotels, food, destinations, and trips.',
                            'Built trip data creation, update, and automation workflows.',
                        ],
                    ],
                    [
                        'name' => 'The Loan Tracker',
                        'highlights' => [
                            'Implemented loan data management system with Zapier API integration.',
                            'Designed multi-role system with Admin, Team Leader, and Team User.',
                            'Implemented role-based access and permission management.',
                            'Configured editable status management using DataTables.',
                            'Developed campaign templates and system settings modules.',
                            'Built cron-based automatic campaign assignment system.',
                            'Implemented multi-admin hierarchical team structure.',
                            'Developed loan data, campaign tracking, and user assignment logic.',
                        ],
                    ],
                ],
            ],
        ];

        $education = [
            'degree' => 'B.Com with Accountancy (55.70%)',
            'duration' => 'November 2020 – April 2024',
            'college' => 'Shree M.P. Shah Commerce College, Surendranagar',
        ];

        $projects = [
            [
                'name' => 'Piplana Pane',
                'stack' => ['Laravel 11', 'MySQL', 'Tailwind', 'REST API'],
                'description' => 'Core product platform with upgraded Laravel 11 backend, optimized APIs, and GST billing automation.',
            ],
            [
                'name' => 'mytravelpa.ai',
                'stack' => ['Laravel', 'GPT API', 'MySQL', 'Automation'],
                'description' => 'Travel automation platform with AI-generated content and workflow automation for trips and destinations.',
            ],
            [
                'name' => 'Simply Shutters',
                'stack' => ['Laravel', 'Excel Import', 'Lazy Loading'],
                'description' => 'Bulk product import and optimized listing experience for large datasets with pagination and lazy loading.',
            ],
            [
                'name' => 'Vikash Pen World',
                'stack' => ['Laravel', 'Cart System', 'CAPTCHA'],
                'description' => 'E-commerce workflow covering cart, checkout, order processing, and secure contact forms.',
            ],
            [
                'name' => 'The Loan Tracker',
                'stack' => ['Laravel', 'Zapier', 'Cron Jobs', 'DataTables'],
                'description' => 'Loan and campaign tracking system with Zapier integration, role hierarchy, and automated campaign assignment.',
            ],
            [
                'name' => 'GST Invoice Module',
                'stack' => ['Laravel', 'PDF', 'CRUD', 'MySQL'],
                'description' => 'Comprehensive GST invoicing with CRUD operations, filters, PDF generation, and performance-optimized queries.',
            ],
        ];

        $contacts = [
            'email' => 'mailto:ramanujsandip876@gmail.com',
            'whatsapp' => 'https://wa.me/917041144652',
            'linkedin' => 'https://www.linkedin.com/in/sandip-ramanuj-a5a45b302',
        ];

        $social = [
            'linkedin' => 'https://www.linkedin.com/in/sandip-ramanuj-a5a45b302',
            'github' => null,
            'email' => 'mailto:ramanujsandip876@gmail.com',
        ];

        return view('portfolio.index', compact(
            'personal',
            'aboutSummary',
            'stats',
            'skills',
            'experience',
            'education',
            'projects',
            'contacts',
            'social'
        ));
    }
}

