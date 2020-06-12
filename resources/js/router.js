import VueRouter from 'vue-router'
import Vue from 'vue'

// Pages
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import AdminInternshipPosts from './pages/admin/InternshipPosts'
import AdminVerifyCompanies from './pages/admin/VerifyCompanies'

import MyComponent from './components/MyComponent'
import RolesIndex from './pages/roles/index'
import RolesCreate from './pages/roles/create'
import RolesEdit from './pages/roles/edit'
import ProfileIndex from './pages/profile/index'
import ProfileEdit from './pages/profile/edit'
import CompanyProfile from './pages/company/profile'
import CompanyEdit from './pages/company/edit'
import CompanyRegister from './pages/company/register'
import CompanyLogin from './pages/company/login'
import CompanyVerifyMobile from './pages/company/VerifyMobile'
import CompanyPrimaryDetails from './pages/company/PrimaryDetails'
import CompanyAddress from './pages/company/Address'
import CompanyAdditionalDetails from './pages/company/AdditionalDetails'
import CompanySocialMediaLinks from './pages/company/SocialMediaLinks'
import CompanyDashboard from './pages/company/Dashboard'
import CompanyPostInternship from './pages/company/PostInternship'
import CompanyPostedInternships from './pages/company/PostedInternships'
import CompanyViewApplications from './pages/company/ViewApplications'
import CompanyStudentResponsePage from './pages/company/StudentResponsePage'
import CompanyPrimaryDetailsEdit from './pages/company/edit/PrimaryDetailsEdit'
import CompanyAddressEdit from './pages/company/edit/AddressEdit'
import CompanyAdditionalDetailsEdit from './pages/company/edit/AdditionalDetailsEdit'
import CompanySocialMediaLinksEdit from './pages/company/edit/SocialMediaLinksEdit'
import CompanyEditPage from './pages/company/edit/EditPage'



import StudentRegister from './pages/student/register'
import StudentVerifyMobile from './pages/student/VerifyMobile'
import StudentDashboard from './pages/student/Dashboard'
import StudentPrimaryDetails from './pages/student/PrimaryDetails'
import StudentInternshipPreferences from './pages/student/InternshipPreferences'
import StudentGraduationDetails from './pages/student/GraduationDetails'
import StudentPostGraduationDetails from './pages/student/PostGraduationDetails'
import StudentTenthDetails from './pages/student/TenthDetails'
import StudentTwelthDetails from './pages/student/TwelthDetails'
import StudentDiplomaDetails from './pages/student/DiplomaDetails'
import StudentPhdDetails from './pages/student/PhdDetails'
import StudentJobDetails from './pages/student/JobDetails'
import StudentInternshipDetails from './pages/student/InternshipDetails'
import StudentPositionOfResp from './pages/student/PositionOfResp'
import StudentTrainingDetails from './pages/student/TrainingDetails'
import StudentProjectDetails from './pages/student/ProjectDetails'
import StudentAdditionalDetails from './pages/student/AdditionalDetails'
import StudentLinksPage from './pages/student/LinksPage'
import StudentSkillDetails from './pages/student/SkillDetails'
import StudentEducationDetails from './pages/student/EducationDetails'
import StudentExperienceDetails from './pages/student/ExperienceDetails'
import StudentOtherExperienceDetails from './pages/student/OtherExperienceDetails'
import StudentOtherDetails from './pages/student/OtherDetails'
import StudentInternshipPostPage from './pages/student/InternshipPostPage'
import StudentAssessmentQuestionsPage from './pages/student/AssessmentQuestionsPage'
import StudentViewResume from './pages/student/ViewResume'

import VerifyMobile from './pages/register/VerifyMobile'

// Routes
const routes = [{
        path: '/',
        // name: 'home',
        // component: Home,
        name: 'MyComponent',
        component: MyComponent,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    // USER ROUTES
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },
    // ADMIN ROUTES
    {
        path: '/admin',
        name: 'admin.dashboard',
        component: AdminDashboard,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/admin/internshipposts',
        name: 'admin.InternshipPosts',
        component: AdminInternshipPosts,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/admin/verifycompanies',
        name: 'admin.VerifyCompanies',
        component: AdminVerifyCompanies,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/roles',
        name: 'roles.index',
        component: RolesIndex,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/roles/store',
        name: 'roles.create',
        component: RolesCreate,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/roles/edit/:id',
        name: 'roles.edit',
        component: RolesEdit,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/profile',
        name: 'profile.index',
        component: ProfileIndex,
        meta: {
            auth: true
        }
    },
    {
        path: '/verifyMobile',
        name: 'verify.mobile',
        component: VerifyMobile,
        meta: {
            auth: true
        }
    },

    {
        path: '/profile/edit',
        name: 'profile.edit',
        component: ProfileEdit,
        meta: {
            auth: true
        }
    },

    // Company Routes

    {
        path: '/company/register',
        name: 'company.register',
        component: CompanyRegister,
        meta: {
            auth: false
        }
    },
    {
        path: '/company/login',
        name: 'company.login',
        component: CompanyLogin,
        meta: {
            auth: false
        }
    },

    {
        path: '/company/verifyMobile',
        name: 'company.VerifyMobile',
        component: CompanyVerifyMobile,
        meta: {
            auth: true
        }
    },

    // {
    //     path: '/company/:id',
    //     name: 'company.profile',
    //     component: CompanyProfile,
    //     meta: {
    //         auth: true
    //     }
    // },

    {
        path: '/company/edit/',
        name: 'company.edit',
        component: CompanyEdit,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/primarydetails',
        name: 'company.PrimaryDetails',
        component: CompanyPrimaryDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/address',
        name: 'company.Address',
        component: CompanyAddress,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/additionaldetails',
        name: 'company.AdditionalDetails',
        component: CompanyAdditionalDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/socialmedialinks',
        name: 'company.SocialMediaLinks',
        component: CompanySocialMediaLinks,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/dashboard',
        name: 'company.Dashboard',
        component: CompanyDashboard,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/postinternship',
        name: 'company.PostInternship',
        component: CompanyPostInternship,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/view/internships',
        name: 'company.PostedInternships',
        component: CompanyPostedInternships,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/view/:id/applications',
        name: 'company.ViewApplications',
        component: CompanyViewApplications,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/view/:id/response',
        name: 'company.StudentResponsePage',
        component: CompanyStudentResponsePage,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/primarydetails/edit',
        name: 'company.PrimaryDetailsEdit',
        component: CompanyPrimaryDetailsEdit,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/address/edit',
        name: 'company.AddressEdit',
        component: CompanyAddressEdit,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/additionaldetails/edit',
        name: 'company.AdditionalDetailsEdit',
        component: CompanyAdditionalDetailsEdit,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/socialmedialinks/edit',
        name: 'company.SocialMediaLinksEdit',
        component: CompanySocialMediaLinksEdit,
        meta: {
            auth: true
        }
    },

    {
        path: '/company/editpage',
        name: 'company.EditPage',
        component: CompanyEditPage,
        meta: {
            auth: true
        }
    },

    // Student Routes

    {
        path: '/student/register',
        name: 'student.Register',
        component: StudentRegister,
        meta: {
            auth: false
        }
    },

    {
        path: '/student/verifyMobile',
        name: 'student.VerifyMobile',
        component: StudentVerifyMobile,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/dashboard',
        name: 'student.Dashboard',
        component: StudentDashboard,
        meta: {
            auth: true
        }
    },
    {
        path: '/student/primarydetails',
        name: 'student.PrimaryDetails',
        component: StudentPrimaryDetails,
        meta: {
            auth: true
        }
    },
    {
        path: '/student/internshippreferences',
        name: 'student.InternshipPreferences',
        component: StudentInternshipPreferences,
        meta: {
            auth: true
        }
    },
    {
        path: '/student/graduationdetails',
        name: 'student.GraduationDetails',
        component: StudentGraduationDetails,
        meta: {
            auth: true
        }
    },
    {
        path: '/student/postgraduationdetails',
        name: 'student.PostGraduationDetails',
        component: StudentPostGraduationDetails,
        meta: {
            auth: true
        }
    },
    {
        path: '/student/tenthdetails',
        name: 'student.TenthDetails',
        component: StudentTenthDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/twelthdetails',
        name: 'student.TwelthDetails',
        component: StudentTwelthDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/diplomadetails',
        name: 'student.DiplomaDetails',
        component: StudentDiplomaDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/phddetails',
        name: 'student.PhdDetails',
        component: StudentPhdDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/jobdetails',
        name: 'student.JobDetails',
        component: StudentJobDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/internshipdetails',
        name: 'student.InternshipDetails',
        component: StudentInternshipDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/positionofresponsibility',
        name: 'student.PositionOfResp',
        component: StudentPositionOfResp,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/trainingdetails',
        name: 'student.TrainingDetails',
        component: StudentTrainingDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/projectdetails',
        name: 'student.ProjectDetails',
        component: StudentProjectDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/additionaldetails',
        name: 'student.AdditionalDetails',
        component: StudentAdditionalDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/links',
        name: 'student.LinksPage',
        component: StudentLinksPage,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/skilldetails',
        name: 'student.SkillDetails',
        component: StudentSkillDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/educationdetails',
        name: 'student.EducationDetails',
        component: StudentEducationDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/experiencedetails',
        name: 'student.ExperienceDetails',
        component: StudentExperienceDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/otherexperiencedetails',
        name: 'student.OtherExperienceDetails',
        component: StudentOtherExperienceDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/otherdetails',
        name: 'student.OtherDetails',
        component: StudentOtherDetails,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/internship/:id/details',
        name: 'student.InternshipPostPage',
        component: StudentInternshipPostPage,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/internship/:id/assessment/questions',
        name: 'student.AssessmentQuestionsPage',
        component: StudentAssessmentQuestionsPage,
        meta: {
            auth: true
        }
    },

    {
        path: '/student/resume/view',
        name: 'student.ViewResume',
        component: StudentViewResume,
        meta: {
            auth: true
        }
    },

]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})

export default router