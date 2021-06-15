<?php


namespace App\Providers;

use Illuminate\Contracts\Container\Container as ContainerContract;
use Roots\Acorn\Sage\ViewFinder;
use Roots\Acorn\View\FileViewFinder;
use Illuminate\Support\Str;

use function Roots\view;


class WPJobManager {
    public function __construct(
        ViewFinder $sageFinder,
        FileViewFinder $fileFinder,
        ContainerContract $app
    ) {
        $this->app = $app;
        $this->fileFinder = $fileFinder;
        $this->sageFinder = $sageFinder;
    }

    /**
     * Support blade templates for the main template include.
     */
    public function templateInclude(string $template): string
    {
        if (!$this->isJobManagerTemplate($template)) {
            return $template;
        }
        return $this->locateThemeTemplate($template) ?: $template;
    }

    /**
     * Filter a template path, taking into account theme templates and creating
     * blade loaders as needed.
     */
    public function template(string $template): string
    {
        // Locate any matching template within the theme.
        $themeTemplate = $this->locateThemeTemplate($template);
        if (!$themeTemplate) {
            return $template;
        }


        // Include directly unless it's a blade file.
        if (!Str::endsWith($themeTemplate, '.blade.php')) {
            return $themeTemplate;
        }

        // We have a template, create a loader file and return it's path.
        return view(
            $this->fileFinder->getPossibleViewNameFromPath(realpath($themeTemplate))
        )->makeLoader();
    }

    /**
     * Check if template is a WP Job Manager template.
     */
    protected function isJobManagerTemplate(string $template): bool
    {
        return strpos($template, \JOB_MANAGER_PLUGIN_DIR) !== false || strpos($template, \JOB_MANAGER_APPLICATIONS_PLUGIN_DIR) !== false;
    }

    /**
     * Locate the theme's WooCommerce blade template when available.
     */
    protected function locateThemeTemplate(string $template): string
    {
        if( strpos($template, \JOB_MANAGER_APPLICATIONS_PLUGIN_DIR) !== false ) {
            $themeTemplate = 'wp-job-manager-applications/' . str_replace(\JOB_MANAGER_APPLICATIONS_PLUGIN_DIR . '/templates/', '', $template);
        } else {
            $themeTemplate = 'job_manager/' . str_replace(\JOB_MANAGER_PLUGIN_DIR . '/templates/', '', $template);
        }

        return locate_template($this->sageFinder->locate($themeTemplate));
    }
}
