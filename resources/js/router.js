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
import AdminViewInternshipsDetail from './pages/admin/ViewInternshipsDetail'
import AdminViewCompanies from './pages/admin/ViewCompanies'
import ContactPage from './pages/ContactPage'
import AdminRegister from './pages/admin/Register'
import AdminRegisteredCompanies from './pages/admin/RegisteredCompanies'
import AdminViewRegisteredCompanies from './pages/admin/ViewRegisteredCompanies'
import AdminPostedInternships from './pages/admin/PostedInternships'
import AdminViewPostedInternships from './pages/admin/ViewPostedInternships'


import LandingPage from './pages/LandingPage'

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
import StudentRegister from './pages/student/Register'
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
import StudentInternshipsMainPage from './pages/student/InternshipsMainPage'
import StudentInternship from './pages/student/StudentInternship'
import ViewStudentInternship from './pages/student/ViewStudentInternship'
import StudentViewAndEditResume from './pages/student/ViewAndEditResume'
import StudentInternshipDetailsEdit from './pages/student/InternshipDetailsEdit'
import StudentJobDetailsEdit from './pages/student/JobDetailsEdit'
import StudentPositionOfRespEdit from './pages/student/PositionOfRespEdit'
import StudentTrainingDetailsEdit from './pages/student/TrainingDetailsEdit'
import StudentProjectDetailsEdit from './pages/student/ProjectDetailsEdit'

import VerifyMobile from './pages/register/VerifyMobile'

// Routes
const routes = [{
        path: '/',
        name: 'LandingPage',
        component: LandingPage,
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
            auth: undefined
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

    {
        path: '/contact',
        name: 'ContactPage',
        component: ContactPage,
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
        path: '/admin/register',
        name: 'admin.register',
        component: AdminRegister,
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
        path: '/admin/:id/viewinternshipsdetail',
        name: 'admin.ViewInternshipsDetail',
        component: AdminViewInternshipsDetail,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/admin/viewcompanies/:id/details',
        name: 'admin.ViewCompanies',
        component: AdminViewCompanies,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/admin/registeredcompanies',
        name: 'admin.RegisteredCompanies',
        component: AdminRegisteredCompanies,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/admin/viewregisteredcompanies/:id/details',
        name: 'admin.ViewRegisteredCompanies',
        component: AdminViewRegisteredCompanies,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/admin/postedinternships',
        name: 'admin.PostedInternships',
        component: AdminPostedInternships,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/admin/viewpostedinternships/:id/details',
        name: 'admin.ViewPostedInternships',
        component: AdminViewPostedInternships,
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
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
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
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/primarydetails',
        name: 'company.PrimaryDetails',
        component: CompanyPrimaryDetails,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/address',
        name: 'company.Address',
        component: CompanyAddress,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/additionaldetails',
        name: 'company.AdditionalDetails',
        component: CompanyAdditionalDetails,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/socialmedialinks',
        name: 'company.SocialMediaLinks',
        component: CompanySocialMediaLinks,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/dashboard',
        name: 'company.Dashboard',
        component: CompanyDashboard,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/postinternship',
        name: 'company.PostInternship',
        component: CompanyPostInternship,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/view/internships',
        name: 'company.PostedInternships',
        component: CompanyPostedInternships,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/view/:id/applications',
        name: 'company.ViewApplications',
        component: CompanyViewApplications,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/view/:id/response',
        name: 'company.StudentResponsePage',
        component: CompanyStudentResponsePage,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/primarydetails/edit',
        name: 'company.PrimaryDetailsEdit',
        component: CompanyPrimaryDetailsEdit,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/address/edit',
        name: 'company.AddressEdit',
        component: CompanyAddressEdit,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/additionaldetails/edit',
        name: 'company.AdditionalDetailsEdit',
        component: CompanyAdditionalDetailsEdit,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/socialmedialinks/edit',
        name: 'company.SocialMediaLinksEdit',
        component: CompanySocialMediaLinksEdit,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/company/editpage',
        name: 'company.EditPage',
        component: CompanyEditPage,
        meta: {
            auth: { roles: 4, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
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
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/dashboard',
        name: 'student.Dashboard',
        component: StudentDashboard,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/student/primarydetails',
        name: 'student.PrimaryDetails',
        component: StudentPrimaryDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/student/internshippreferences',
        name: 'student.InternshipPreferences',
        component: StudentInternshipPreferences,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/student/graduationdetails',
        name: 'student.GraduationDetails',
        component: StudentGraduationDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/student/postgraduationdetails',
        name: 'student.PostGraduationDetails',
        component: StudentPostGraduationDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/student/tenthdetails',
        name: 'student.TenthDetails',
        component: StudentTenthDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/twelthdetails',
        name: 'student.TwelthDetails',
        component: StudentTwelthDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/diplomadetails',
        name: 'student.DiplomaDetails',
        component: StudentDiplomaDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/phddetails',
        name: 'student.PhdDetails',
        component: StudentPhdDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/jobdetails',
        name: 'student.JobDetails',
        component: StudentJobDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/internshipdetails',
        name: 'student.InternshipDetails',
        component: StudentInternshipDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/positionofresponsibility',
        name: 'student.PositionOfResp',
        component: StudentPositionOfResp,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/trainingdetails',
        name: 'student.TrainingDetails',
        component: StudentTrainingDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/projectdetails',
        name: 'student.ProjectDetails',
        component: StudentProjectDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/additionaldetails',
        name: 'student.AdditionalDetails',
        component: StudentAdditionalDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/links',
        name: 'student.LinksPage',
        component: StudentLinksPage,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/skilldetails',
        name: 'student.SkillDetails',
        component: StudentSkillDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/educationdetails',
        name: 'student.EducationDetails',
        component: StudentEducationDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/experiencedetails',
        name: 'student.ExperienceDetails',
        component: StudentExperienceDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/otherexperiencedetails',
        name: 'student.OtherExperienceDetails',
        component: StudentOtherExperienceDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/otherdetails',
        name: 'student.OtherDetails',
        component: StudentOtherDetails,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/internships/main',
        name: 'student.InternshipsMainPage',
        component: StudentInternshipsMainPage,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/internship/:id/details',
        name: 'student.InternshipPostPage',
        component: StudentInternshipPostPage,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/internship/:id/assessment/questions',
        name: 'student.AssessmentQuestionsPage',
        component: StudentAssessmentQuestionsPage,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/resume/view',
        name: 'student.ViewResume',
        component: StudentViewResume,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/studentinternship',
        name: 'student.StudentInternship',
        component: StudentInternship,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/viewstudentinternship/:id/details',
        name: 'student.ViewStudentInternship',
        component: ViewStudentInternship,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/resume/edit',
        name: 'student.ViewAndEditResume',
        component: StudentViewAndEditResume,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/internshipdetails/:id/edit',
        name: 'student.InternshipDetailsEdit',
        component: StudentInternshipDetailsEdit,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/jobdetails/:id/edit',
        name: 'student.JobDetailsEdit',
        component: StudentJobDetailsEdit,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/positionofresponsibility/:id/edit',
        name: 'student.PositionOfRespEdit',
        component: StudentPositionOfRespEdit,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/trainingdetails/:id/edit',
        name: 'student.TrainingDetailsEdit',
        component: StudentTrainingDetailsEdit,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/student/projectdetails/:id/edit',
        name: 'student.ProjectDetailsEdit',
        component: StudentProjectDetailsEdit,
        meta: {
            auth: { roles: 5, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})

export default router
