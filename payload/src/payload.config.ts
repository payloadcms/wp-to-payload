import { buildConfig } from 'payload/config';
import path from 'path';
import { Pages } from './collections/Pages';
import { Media } from './collections/Media';
import { Posts } from './collections/Posts';
import { CustomPosts } from './collections/CustomPosts';
import { Header } from './globals/Header';

export default buildConfig({
  collections: [
    CustomPosts,
    Pages,
    Posts,
    Media,
  ],
  globals: [
    Header,
  ],
  typescript: {
    outputFile: path.resolve(__dirname, 'payload-types.ts'),
  },
});
