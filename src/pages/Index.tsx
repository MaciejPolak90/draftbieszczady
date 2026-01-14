import { Header } from "@/components/Header";
import { MobileBottomBar } from "@/components/MobileBottomBar";
import { HeroSection } from "@/components/HeroSection";
import { FeaturesSection } from "@/components/FeaturesSection";
import { LayoutSection } from "@/components/LayoutSection";
import { GallerySection } from "@/components/GallerySection";
import { PetsSection } from "@/components/PetsSection";
import { PricingSection } from "@/components/PricingSection";
import { LocationSection } from "@/components/LocationSection";
import { ContactSection } from "@/components/ContactSection";
import { FAQSection } from "@/components/FAQSection";
import { Footer } from "@/components/Footer";

const Index = () => {
  return (
    <div className="min-h-screen">
      <Header />
      <main className="pb-20 lg:pb-0">
        <HeroSection />
        <FeaturesSection />
        <LayoutSection />
        <GallerySection />
        <PetsSection />
        <PricingSection />
        <LocationSection />
        <ContactSection />
        <FAQSection />
      </main>
      <Footer />
      <MobileBottomBar />
    </div>
  );
};

export default Index;
